<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            if ($barang->stock == 0) {
                $barang->status = 'not available';
                $barang->save();
            } else {
                $barang->status = 'in stock';
                $barang->save();
            }
        }

        return view('peminjaman-barang', ['users' => $users, 'barangs' => $barangs]);
    }
    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(30)->toDateString();

        $barang = Barang::findOrFail($request->barang_id);

        if($barang->stock >= $request->dipinjam) {
            $barang->decrement('stock', $request->dipinjam);
            $barang->status = 'not available';
            $barang->save();
            try {
                DB::beginTransaction();
                RentLogs::create($request->all());
                DB::commit();

                Session::flash('message', 'Peminjaman Berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('peminjaman');
            } catch (\Throwable $th) {
                DB::rollBack();
                Session::flash('message', 'Terjadi kesalahan saat menyimpan data');
                Session::flash('alert-class', 'alert-danger');
                return redirect('peminjaman');
            }
        } else {
            Session::flash('message', 'Tidak bisa dipinjam, Stock tidak mencukupi');
            Session::flash('alert-class', 'alert-danger');
            return redirect('peminjaman');
        }
    }

    public function pengembalian()
    {
        $users = User::where('id', '!=', 1)->get();
        $barangs = Barang::all();
        return view ('pengembalian', ['users' => $users, 'barangs' => $barangs]);
    }
    public function simpanPengembalian(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('barang_id', $request->barang_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if($countData) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $barang = Barang::findOrFail($request->barang_id);
            $barang->increment('stock', $rentData->dipinjam);
            if ($barang->stock > 0) {
                $barang->status = 'in stock';
                $barang->save();
            } else {
                $barang->status = 'not avaliable';
                $barang->save();
            }

            Session::flash('message', 'Barang Berhasil Dikembalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('pengembalian');
        }
        else {
            Session::flash('message', 'Terjadi Suatu Kesalahan');
            Session::flash('alert-class', 'alert-danger');
            return redirect('pengembalian');
        }
    }
}
