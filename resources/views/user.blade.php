@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>User List</h1>
    <div class="my-5 d-flex justify-content-end">
        <a href="/registed-users" class="btn btn-primary">Pendataran User</a>
    </div>

    <div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th  class="d-flex justify-content-center">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
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
                            <a href="/user-delete/{{ $item->slug }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection