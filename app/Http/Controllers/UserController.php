<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $pinjamlogs = RentLogs::with(['user', 'barang'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['pinjam_logs' => $pinjamlogs]);
    }
    public function index()
    {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }
    public function registedUsers()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id',2)->get();
        return view('registed-users', ['registeredUsers' => $registeredUsers]);
    }
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        $pinjamlogs = RentLogs::with(['user', 'barang'])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'pinjam_logs' => $pinjamlogs]);
    }
    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'Aktifasi Akun Berhasil');
    }
    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('users')->with('status', 'User Berhasil Dihapus');
    }
}
