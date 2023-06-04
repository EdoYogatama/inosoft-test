<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraanId',
        'stock',
        'terjual'
    ];

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class);
    }
}
