<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Bidang;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {

         if (request()->filled('cari')) {
            $cari = request()->input('cari');

            // Sesuaikan dengan kolom relasi `jenis`
            $query->whereHas('jenis', function ($q) use ($cari) {
                $q->where('nama', 'like', '%' . $cari . '%');
            });
        }

        $dataSurat = Surat::with('bidang')->get();

        // dd($dataSurat);
        return view('admin.arsip.index',compact('dataSurat'));

     }

    public function create()
    {
        $dataBidang = Bidang::get();
        $dataJenis = Jenis::get();

        // dd($dataBidang);
        return view('admin.arsip.create', compact('dataBidang','dataJenis'));
    }

    public function store(Request $request){

        // dd($request->all());
       $request->validate([
            'bidang_id' => 'required',
            'nama_surat' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'isi_surat' => 'required',
            'file_surat' => 'file|mimes:pdf|max:4048',
            'bidang_id' => 'required',
            'jenis_id' => 'required',
        ]);

       $dataArsip = [

           'nama_surat' => $request->nama_surat,
           'nomor_surat' => $request->nomor_surat,
           'tanggal_surat' => $request->tanggal_surat,
           'isi_surat' => $request->isi_surat,
           'file_surat' => $request->file_surat,
           'bidang_id' => $request->bidang_id,
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
        $query = Surat::whereHas('jenis', function ($q) {
            $q->where('nama', 'Surat Masuk');
        });

        if (request()->filled('cari')) {
            $cari = request()->input('cari');

            // Tambahkan pencarian pada kolom-kolom tertentu
            $query->where(function ($q) use ($cari) {
                $q->where('nama_surat', 'like', '%' . $cari . '%')
                ->orWhere('isi_surat', 'like', '%' . $cari . '%');
            });
        }

        $suratMasuk = $query->with('jenis')->get();

        return view('admin.arsip.surat-masuk', compact('suratMasuk'));
    }

    public function suratKeluar ()
    {
        $query = Surat::whereHas('jenis', function ($q) {
                $q->where('nama', 'Surat Keluar');
        });

        if (request()->filled('cari')) {
                $cari = request()->input('cari');

                // Tambahkan pencarian pada kolom-kolom tertentu
                $query->where(function ($q) use ($cari) {
                    $q->where('nama_surat', 'like', '%' . $cari . '%')
                    ->orWhere('isi_surat', 'like', '%' . $cari . '%');
            });
        }

        $suratKeluar = $query->with('jenis')->get();

        return view('admin.arsip.surat-keluar', compact('suratKeluar'));
    }


    public function semuaSurat()
    {
        $dataJenis = Jenis::all();

        // Mulai query builder
        $semuaSurat = Surat::with('jenis');

        // Tangkap input pencarian dan tag
        $cari = request()->input('cari');

        // Jika ada input pencarian, tambahkan kondisi where
        if ($cari) {
            $semuaSurat->where(function ($query) use ($cari) {
                $query->where('isi_surat', 'like', '%' . $cari . '%')
                      ->orWhere('nama_surat', 'like', '%' . $cari . '%')
                      ->get();
            });
        }
        // Jika ada tag, tambahkan kondisi whereHas untuk relasi jenis



        // Eksekusi query
        $semuaSurat = $semuaSurat->get();

        return view('admin.arsip.semua-surat', compact('semuaSurat', 'dataJenis'));
    }


    public function edit($id)
    {
        $semuaSurat = Surat::findOrFail($id);
        $dataBidang = Bidang::get();
        $dataJenis = Jenis::get();

        // dd($semuaSurat);
        return view('admin.arsip.edit', compact('semuaSurat','dataBidang','dataJenis'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $semuaSurat = Surat::findOrFail($id);

        $request->validate([
            'bidang_id' => 'required',
            'nama_surat' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'isi_surat' => 'required',
            'file_surat' => 'file|mimes:pdf|max:4048',
            'jenis_id' => 'required',
        ]);

        $dataArsip = [
            'nama_surat' => $request->nama_surat,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'isi_surat' => $request->isi_surat,
            'bidang_id' => $request->bidang_id,
            'jenis_id' => $request->jenis_id,
        ];

        if ($request->file('file_surat')) {
            if ($semuaSurat->file_surat) {
                Storage::delete($semuaSurat->file_surat);
            }
            $dataArsip['file_surat'] = $request->file('file_surat')->store('arsip-surat');
        }

        $semuaSurat->update($dataArsip);

        return redirect()->route('semua.surat')->with('success', "Data Surat berhasil diupdate");
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
