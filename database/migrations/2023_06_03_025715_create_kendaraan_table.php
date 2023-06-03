<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_keluaran');
            $table->string('warna');
            $table->decimal('harga', $precision = 8, $scale = 2);
            $table->string('mesin');
            $table->string('jenis');
            $table->bool('isSoldOut');
            $table->decimal('kapasitas_penumpang');
            $table->string('tipe');
            $table->string('tipe_suspensi');
            $table->string('tipe_transmisi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
};
