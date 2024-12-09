<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $dataKategori = Kategori::orderBy('id', 'ASC')->get();
        return view('admin.kategori.index', compact('dataKategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $dataKategori = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($dataJenis);

        Kategori::create($dataKategori);

        return redirect()->route('kategori.index')->with(['success' => 'Data Kategori Berhasil disimpan']);
    }

   public function edit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $dataKategori = Kategori::findOrFail($id);
        $dataKategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diperbarui.');
    }
}


