@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')
   <h2>Apakah Anda Yakin Ingin Menghapus {{ $user->username }}</h2>
   <div class="mt-5">
    <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger">Ya</a>
    <a href="/users" class="btn btn-primary">Tidak</a>
   </div>
@endsection