<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kendaraan;

class Mobil extends Kendaraan
{
    use HasFactory;
    protected $table = 'kendaraan';
    protected $fillable = [
        'tahun_keluaran',
        'warna',
        'harga',
        'mesin',
        'jenis',
        'isSoldOut',
        'tipe',
        'kapasista_penumpang'
    ];

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->jenis = 'Mobil';
            $model->isSoldOut = false;
        });
    }
}
