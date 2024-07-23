@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mb-5">Form Peminjaman Barang</h1>

        <div class="mt-5">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form action="peminjaman" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control inputbox">
                    <option value="">Pilih User</option>
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="barangr" class="form-label">Nama Barang</label>
                <select name="barang_id" id="barang" class="form-control inputbox">
                    <option value="">Pilih Barang</option>
                    @foreach ($barangs as $item)
                    <option value="{{ $item->id }}">{{ $item->barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="dipinjam" class="form-label">Jumlah</label>
                <input type="number" name="dipinjam" id="dipinjam" class="form-control">
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.inputbox').select2();
    })
</script>
@endsection