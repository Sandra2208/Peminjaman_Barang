@extends('layouts.mainlayout')

@section('title', 'Delete Barang')

@section('content')
   <h2>Apakah Anda Yakin Ingin Menghapus {{ $barang->name_barang }} ?</h2>
   <div class="mt-5">
    <a href="/barang-destroy/{{ $barang->slug }}" class="btn btn-danger">Ya</a>
    <a href="/barang" class="btn btn-primary">Tidak</a>
   </div>
@endsection