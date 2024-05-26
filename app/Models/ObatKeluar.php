<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggalObat',
        'kodeObat',
        'namaObat', 
        'stokObat',
        'obatKeluar',
        'satuan',
        'sisaObat'
    ];
}
