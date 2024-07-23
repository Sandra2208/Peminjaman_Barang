@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
   <h2>Apakah Anda Yakin Ingin Menghapus {{ $category->name }}</h2>
   <div class="mt-5">
    <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger">Ya</a>
    <a href="/categories" class="btn btn-primary">Tidak</a>
   </div>
@endsection