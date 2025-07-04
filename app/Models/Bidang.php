<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Surat;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidang';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function surat()
    {
        return $this->hasMany(Surat::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
