<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request) {
        $barangs = Barang::all();
        return view('barang', ['barangs' => $barangs]);
    }
    public function add()
    {
        $categories = Category::all();
        return view('add-barang', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:barangs|max:50',
            'barang' => 'required|max:50',
            'stock' => 'required|integer|max:50',
        ]);

        $barang = Barang::create($request->all());
        $barang->categories()->sync($request->categories);
        return redirect('barang')->with('status', 'Barang berhasil ditambahkan');
    }
    public function edit($slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        $categories = Category::all();
        return view('barang-edit', ['categories' => $categories, 'barang' => $barang]);
    }
    public function update(Request $request, $slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        $newName = '';
        $choosenCategories ='';
        $barang->update($request->all());
        
        if($request->categories){
            $barang->categories()->sync($request->categories);
        }
        return redirect('barang')->with('status', 'Data berhasil diperbarui');
    }
    public function delete($slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        return view('barang-delete', ['barang' =>$barang]);
    }
    public function destroy($slug)
    {
        $barang = Barang::where('slug', $slug)->first();
        $barang->categories()->delete();
        $barang->delete();
        return redirect('barang')->with('status', 'Barang Berhasil Dihapus');
    }
}
