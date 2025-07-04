<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Surat;
use App\Models\Jenis;
use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratController extends Controller
{
   public function index()
{


    // Ambil semua jenis surat untuk dropdown
    $jenisSurat = jenis::all();

    // Ambil semua bidang untuk ditampilkan
    $indexBidang = Bidang::all();

    // Ambil bidang user login
    $bidang = User::with('bidang')->find(auth()->user()->id)?->bidang->nama;

    // Jika tidak login atau bidang kosong
    if (!auth()->check() || auth()->user()->bidang_id === null) {
        $indexSurat = collect();
    } else {
        $user = auth()->user();

        // Bangun query awal berdasarkan bidang
        $query = Surat::with(['bidang', 'jenis'])
            ->where('bidang_id', $user->bidang_id);

        //Pencarian Dengan tagging
        if (request()->filled('tag')) {
            $tag = request()->input('tag');

            $query->whereHas('jenis', function ($q) use ($tag) {
                $q->where('jenis_id', $tag);
            });

        }

        // Pencarian dengan filter dropdown
        if (request()->filled('cari')) {
            $cari = request()->input('cari');

            // Sesuaikan dengan kolom relasi `jenis`
            $query->whereHas('jenis', function ($q) use ($cari) {
                $q->where('nama', 'like', '%' . $cari . '%');
            });
     }

        $indexSurat = $query->get();

        // Jika ada filter jenis surat, ambil berdasarkan jenis
    }

    return view('user.surat.index', compact('indexSurat', 'indexBidang', 'bidang', 'jenisSurat'));
}


    public function detail($id)
    {
        $detailSurat = Surat::with('jenis','bidang')->findOrFail($id);

        $bidang = User::with('bidang')->find(auth()->user()->id)->bidang->nama;

        return view('user.surat.detail', compact('detailSurat','bidang'));
    }

}
