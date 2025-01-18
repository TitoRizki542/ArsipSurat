<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function index()
    {
        $dataJenis = Jenis::orderBy('id', 'ASC')->get();

        return view('admin.jenis.index', compact('dataJenis'));
    }

    public function create()
    {
        return view('admin.jenis.create');
    }

    public function store(Request $request)
    {
        $dataJenis = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($dataJenis);

        Jenis::create($dataJenis);

        return redirect()->route('jenis.index')->with(['success' => 'Data Jenis Berhasil disimpan']);
    }

     public function edit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $dataJenis = Jenis::findOrFail($id);
        
        $dataJenis->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data Jenis berhasil diperbarui.');
    }
}
