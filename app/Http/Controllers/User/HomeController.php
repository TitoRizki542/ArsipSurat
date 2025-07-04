<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\Bidang;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index()
    {
        $indexBidang = Bidang::all();

       if (!auth()->check()) {
        // Tidak ada user yang login → hasil surat dikosongkan
        $indexSurat = collect(); // atau bisa redirect, terserah
        } else {
            $user = auth()->user();

        if ($user->bidang_id === null) {
        // User login tapi tidak punya bidang
        $indexSurat = collect();
        } else {
        // Ambil surat sesuai bidang
        $indexSurat = Surat::with(['bidang', 'jenis'])
            ->whereHas('bidang', function ($query) use ($user) {
                $query->where('id', $user->bidang_id);
            })
            ->paginate(6);
    }
}

        return view('user.home.index', compact('indexSurat','indexBidang'));
    }
}
