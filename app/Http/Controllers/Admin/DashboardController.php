<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Bidang;
use App\Models\Surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $jenisSurat = Jenis::all();

        $suratMasuk = Surat::whereHas('jenis', function ($q) {
                $q->where('nama', 'Surat Masuk');
            })->with('jenis')->count();

        $suratKeluar = Surat::whereHas('jenis', function ($q) {
                $q->where('nama', 'Surat Keluar');
            })->with('jenis')->count();


        $dataBidang = Bidang::count();

        $dataJenis = Jenis::count();

        $dataSurat = Surat::with('jenis','bidang')->orderBy('id','DESC')->paginate(5);

        return view('admin.dashboard.index', compact('suratMasuk','suratKeluar','dataBidang','dataJenis','dataSurat','jenisSurat'));
    }
}
