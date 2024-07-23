@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Riwayat Peminjaman Barang</h1>
    <div class="mt-5">
        <x-riwayat-table :pinjamlog='$pinjam_logs' />
    </div>
@endsection