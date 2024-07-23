@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
 <div class="my-5 flex-wrap">
    <div class="row">
        @foreach ($barangs as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->kode_barang }}</h5>
                        <p class="card-text">{{ $item->barang }}</p>
                        <p class="card-text">{{ $item->stock }}</p>
                        <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">{{ $item->status }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
 </div>
@endsection