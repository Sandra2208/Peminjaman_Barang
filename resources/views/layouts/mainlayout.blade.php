<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman Barang | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Peminjaman</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
          </nav>

          <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-2 collapse d-lg-block" id="navbarToggleDemo03">
                    @if (Auth::user())
                    @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                            <a href="/barang" @if(request()->route()->uri == 'barang' || request()->route()->uri == 'add-barang' || request()->route()->uri == 'barang-deleted' ||  request()->route()->uri == 'barang-edit/{slug}' ||  request()->route()->uri == 'barang-delete/{slug}') class="active" @endif>Barang</a>
                            <a href="/categories" @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' ||  request()->route()->uri == 'category-edit/{slug}' ||  request()->route()->uri == 'category-delete/{slug}') class="active" @endif>Category</a>
                            <a href="/" @if(request()->route()->uri == '/') class="active" @endif>List Barang</a>
                            <a href="/users" @if(request()->route()->uri == 'users' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-delete/{slug}') class="active" @endif>Users</a>
                            <a href="/peminjaman"  @if(request()->route()->uri == 'peminjaman') class="active" @endif>Peminjaman</a>
                            <a href="/riwayat" @if(request()->route()->uri == 'riwayat') class="active" @endif>Riwayat Peminjaman</a>
                            <a href="/pengembalian" @if(request()->route()->uri == 'pengembalian') class="active" @endif>Pengembalian</a>
                            <a href="/logout">Logout</a>
                            @else
                                <a href="/profile" @if(request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                                <a href="/" @if(request()->route()->uri == '/') class="active" @endif>List Barang</a>
                                <a href="/logout">Logout</a>
                            @endif
                        @else
                        <a href="/login">Login</a>
                    @endif
                </div>
                <div class="content p-4 col-10">
                    @yield('content')
                </div>
            </div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>