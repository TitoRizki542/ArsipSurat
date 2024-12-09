<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis;
use App\Models\Kategori;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $fillable = [
        'kategori_id',
        'jenis_id',
        'nomor_surat',
        'nama_surat',
        'tanggal_surat',
        'tentang_surat',
        'isi_surat',
        'file_surat',
    ];

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'users_id');
    // }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

     public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}