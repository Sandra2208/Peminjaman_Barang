@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')

<div class="mt-3">
    <h2>Barang yang anda pinjam</h2><br>
    <x-riwayat-table :pinjamlog='$pinjam_logs' />
</div>

@endsection