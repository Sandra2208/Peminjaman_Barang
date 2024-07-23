<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RiwayatController extends Controller
{
    public function index(){
        $today = Carbon::now()->toDateString();
        $rentlogs = RentLogs::with(['user', 'barang'])->get();
        return view('riwayat', ['pinjam_logs' => $rentlogs, 'today' => $today]);
    }
}
