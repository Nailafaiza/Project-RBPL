<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lap_penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->decimal('total_pendapatan', 12, 2);
            $table->date('periode');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lap_penjualans');
    }
};