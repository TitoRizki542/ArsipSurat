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
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $path = $file->store('thumbnails', 'public'); // simpan ke storage/app/public/thumbnails
            $dataBidang['thumbnail'] = $path;
        }
        // dd($datadaBidang);

        bidang::create($dataBidang);

        return redirect()->route('bidang.index')->with(['success' => 'Data Bidang Berhasil disimpan']);
    }

   public function edit(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:4048',
        ]);

        $dataBidang = Bidang::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
        // Hapus file lama jika ada
        if ($dataBidang->thumbnail && \Storage::disk('public')->exists($dataBidang->thumbnail)) {
            \Storage::disk('public')->delete($dataBidang->thumbnail);
        }

        // Simpan file baru
                $path = $request->file('thumbnail')->store('thumbnails', 'public');
            } else {
                // Gunakan path lama
                $path = $dataBidang->thumbnail;
            }

            // Update data
            $dataBidang->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'thumbnail' => $path,
            ]);

        return redirect()->route('bidang.index')->with('success', 'Data Bidang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataBidang = Bidang::findOrFail($id);
        if (Surat::where('bidang_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Data Bidang tidak dapat dihapus, Karena digunakan dalam surat.');
        }
        // Hapus thumbnail jika ada
        if ($dataBidang->thumbnail) {
            \Storage::disk('public')->delete($dataBidang->thumbnail);
        }
        // Hapus data bidang
        $dataBidang->delete();

        return redirect()->route('bidang.index')->with('success', 'Data Bidang berhasil dihapus.');
    }
}


