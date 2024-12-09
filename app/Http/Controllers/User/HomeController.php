<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index()
    {
        $indexKategori = Kategori::all();
        $indexSurat = Surat::with('kategori','jenis')->paginate(3);

        return view('user.home.index', compact('indexSurat','indexKategori'));
    }
}
