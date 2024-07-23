@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Daftar Barang</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="my-5 d-flex justify-content-end">
        <a href="add-barang" class="btn btn-primary">Tambah</a>
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->barang }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                        {{ $category->name }}   
                        @endforeach
                    </td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/barang-edit/{{ $item->slug }}">edit</a>
                        <a href="/barang-delete/{{ $item->slug }}">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection