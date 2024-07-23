@extends('layouts.mainlayout')

@section('title', 'Add Barang')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Tambahkan Data Barang</h1>

    <div class="mt-5 w-50">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="add-barang" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" id="code" class="form-control" placeholder="Kode Barang" value="{{ old('kode_barang') }}">
            </div>
            <div class="mb-3">
                <label for="barang" class="form-label">Nama Barang</label>
                <input type="text" name="barang" id="barang" class="form-control" placeholder="Nama Barang" value="{{ old('barang') }}"">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Jumlah Barang</label>
                <input type="integer" name="stock" id="stock" class="form-control" placeholder="Jumlah Barang">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="categories[]" id="category" class="form-control select-multiple" >
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">save</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endsection