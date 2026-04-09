<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('lap_penerimaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->date('tanggal_penerimaan');
            $table->integer('jumlah');
            $table->string('kondisi_barang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lap_penerimaans');
    }
};
