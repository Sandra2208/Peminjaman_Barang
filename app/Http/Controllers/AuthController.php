<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        return view('login');
    }
    public function register(Request $request) 
    {
        return view('register');
    }
    public function authenticating(Request $request) 
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Akun kamu belum aktif, mohoh hubungi admin!');
                return redirect('/login');
            }
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }
            if(Auth::user()->role_id == 2){
                return redirect('profile');
            }
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid!');
        return redirect('/login');
    }
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:50',
            'password' => 'required|max:50',
            'phone' => 'max:50',
            'address' => 'required',
        ]);

        $user = User::create($request->all());

        Session::flash('status', 'seccess');
        Session::flash('message', 'Pendaftaran berhasil, tunggu respon dari admin');
        return redirect('register');
    }
}
