<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kendaraan;

class Motor extends Kendaraan
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
        'tipe_suspensi',
        'tipe_transmisi'
    ];

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->jenis = 'Motor';
            $model->isSoldOut = false;
        });
    }
}
