<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Surat;

class BidangController extends Controller
{
    public function index()
    {
        $dataBidang = Bidang::orderBy('id', 'ASC')->get();

        return view('admin.bidang.index', compact('dataBidang'));
    }

    public function create()
    {
        return view('admin.bidang.create');
    }

    public function store(Request $request)
    {
        $dataBidang = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($dataJenis);

        bidang::create($dataBidang);

        return redirect()->route('bidang.index')->with(['success' => 'Data Bidang Berhasil disimpan']);
    }

   public function edit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $dataBidang = Bidang::findOrFail($id);
        $dataBidang->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('bidang.index')->with('success', 'Data Bidang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataBidang = Bidang::findOrFail($id);
        if (Surat::where('bidang_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Data Bidang tidak dapat dihapus, Karena digunakan dalam surat.');
        }
        $dataBidang->delete();

        return redirect()->route('bidang.index')->with('success', 'Data Bidang berhasil dihapus.');
    }
}


