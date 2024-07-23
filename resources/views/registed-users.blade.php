@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')
    <h1>Pengguna Baru Terdaftar</h1>
    <div class="my-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary">Approved User</a>
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                    <th  class="d-flex justify-content-center">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->username}}</td>
                        <td class="d-flex justify-content-center">
                            @if ($item->phone)
                            {{ $item->phone }}
                                
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}">detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection