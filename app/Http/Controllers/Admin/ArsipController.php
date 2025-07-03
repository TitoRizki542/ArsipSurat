<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {

        $dataSurat = Surat::with('kategori')->get();

        // dd($dataSurat);
        return view('admin.arsip.index',compact('dataSurat'));

    }

    public function create()
    {
        $dataKategori = Kategori::get();
        $dataJenis = Jenis::get();

        // dd($dataKategori);
        return view('admin.arsip.create', compact('dataKategori','dataJenis'));
    }

    public function store(Request $request){

        // dd($request->all());
       $request->validate([
            'nama_surat' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'isi_surat' => 'required',
            'file_surat' => 'file|mimes:pdf|max:4048',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
        ]);

       $dataArsip = [
           'nama_surat' => $request->nama_surat,
           'nomor_surat' => $request->nomor_surat,
           'tanggal_surat' => $request->tanggal_surat,
           'isi_surat' => $request->isi_surat,
           'file_surat' => $request->file_surat,
           'kategori_id' => $request->kategori_id,
           'jenis_id' => $request->jenis_id,
       ];


        if ($request->file('file_surat')) {
            $dataArsip['file_surat'] = $request->file('file_surat')->store('arsip-surat');
        }

        Surat::create($dataArsip);
        // dd($dataArsip);

        return redirect()->route('arsip.index')->with(['success' => 'Surat berhasil diarsipkan.']);
    }

    public function suratMasuk ()
    {
        $suratMasuk = Surat::whereHas('jenis', function ($q) {
                $q->where('nama', 'Surat Masuk');
            })->with('jenis')->get();
        // dd($suratMasuk);
        return view('admin.arsip.surat-masuk', compact('suratMasuk'));
    }

    public function suratKeluar ()
    {
        $suratKeluar = Surat::whereHas('jenis', function ($q) {
                $q->where('nama', 'Surat Keluar');
            })->with('jenis')->get();
        // dd($suratKeluar);
        return view('admin.arsip.surat-keluar', compact('suratKeluar'));
    }

    public function semuaSurat()
    {
        $semuaSurat = Surat::with('jenis','kategori')->get();

        // / $query = request()->cari;
        if($query = request()->cari){
            $semuaSurat = Surat::where('isi_surat', 'like', '%' .$query. '%')
            ->orWhere('nama_surat', 'like', '%' .$query. '%')
            ->get();
        }

        // dd($query);

        return view('admin.arsip.semua-surat', compact('semuaSurat'));
    }

    public function destroy($id)
    {
        $semuaSurat = Surat::findOrFail($id);


        if($semuaSurat->file_surat){
            Storage::delete($semuaSurat->file_surat);
        } $semuaSurat -> delete();

        return redirect()->route('semua.surat')->with('success', "Data Surat berhasil dihapus");

    }
}
