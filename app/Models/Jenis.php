<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Surat;


class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    
    public function surat()
    {
        return $this->hasMany(Surat::class, 'surat_id');
    }
}
