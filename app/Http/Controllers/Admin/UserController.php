<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $dataUser = User::all();

        return view('admin.user.index',compact('dataUser'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $validateData = $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'nomor_hp'=>'required',
            'jenis_kelamin'=>'required',
            'username'=>'required',
            'password'=>'required',        
        ]);

        User::create($validateData);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $dataUser = User::findOrFail($id);
        // dd($dataUser);
        $dataUser->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna Berhasil Dihapus');

    }
}
