<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('jumlah_terjual');
            $table->integer('harga_satuan');
            $table->integer('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
