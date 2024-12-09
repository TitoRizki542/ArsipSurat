<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

     public function login(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($validateData)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Kamu Sudah Berhasil Login!');
        }
        if (Auth::guard('web')->attempt($validateData)) {
            $request->session()->regenerate();
            return redirect()->route('home.index')->with('success', 'Kamu Sudah Berhasil Login!');
        }

        return redirect()->route('login')->with(['failed' => 'Username atau Password tidak ditemukan!']);
    }

     public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index')->with('success','Kamu berhasil Logout!');
    }
}
