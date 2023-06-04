<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Request\AddNewKendaraanRequest;

use App\Traits\BasicAPIResponse;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\Mobil;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    use BasicAPIResponse;
    public function addNewKendaraan (AddNewKendaraanRequest $request) {
        $data = $request->validated();
        $kendaraan = null;
        if($data['jenis']=='Motor'){
            $kendaraan = Motor::create([
                'tahun_keluaran' => $data['tahun_keluaran'],
                'warna' => $data['warna'],
                'harga' => $data['harga'],
                'mesin' => $data['mesin'],
                'tipe_suspensi' => $data['tipe_suspensi'],
                'tipe_transmisi' => $data['tipe_transmisi']
            ]);
        } else if($data['jenis']=='Mobil') {
            $kendaraan = Mobil::create([
                'tahun_keluaran' => $data['tahun_keluaran'],
                'warna' => $data['warna'],
                'harga' => $data['harga'],
                'mesin' => $data['mesin'],
                'kapasitas_penumpang' => $data['kapasitas_penumpang'],
                'tipe' => $data['tipe']
            ]);
        }

        if($kendaraan) {
            $penjualan = Penjualan::create([
                'kendaraanId' => $kendaraan->id,
                'stock' => $data['stock'],
                'terjual' => 0 
            ]);
        }

        return $this->sendOk();
    }

    public function allKendaraan() {
        $kendaraan = Kendaraan::all();
        $penjualan = $kendaraan->penjualan();

        return $this->sendData($penjualan);
    }

    public function allMotor() {
        $find = [
            ['jenis','=','Motor']
        ];

        $motor = Kendaraan::query()->where($find)->get;
        $penjualan = $motor->penjualan();
    }

    public function allMobil() {
        $find = [
            ['jenis','=','Mobil']
        ];

        $mobil = Kendaraan::query()->where($find)->get();
        $penjualan = $mobil->penjualan();
    }

    public function updateStock($id){
        $penjualan = Penjualan::findOrFail($id);

    }
}
