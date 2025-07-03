<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        $indexKategori = Kategori::all();
        $indexSurat = Surat::with('jenis','kategori')->get();

        if($query = request()->cari){
            $indexSurat = Surat::where('isi_surat', 'like', '%' .$query. '%')
            ->orWhere('nama_surat', 'like', '%' .$query. '%')
            ->get();
        }

        if($cariTag = request()->tag){
            $indexSurat = Surat::where('kategori_id', 'like', $cariTag)->get();
        }
        return view('user.surat.index', compact('indexSurat','indexKategori'));
    }

    public function detail($id)
    {
        $detailSurat = Surat::with('jenis','kategori')->findOrFail($id);

        return view('user.surat.detail', compact('detailSurat'));
    }

}
