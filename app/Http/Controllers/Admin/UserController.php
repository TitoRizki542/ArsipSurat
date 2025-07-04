<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::with('bidang')->get();

        // dd($dataUser->toArray());

        return view('admin.user.index',compact('dataUser'));
    }

    public function create()
    {
        $dataBidang = Bidang::all();

        return view('admin.user.create', compact('dataBidang'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $validateData = $request->validate([
            'bidang_id'=>'required',
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
