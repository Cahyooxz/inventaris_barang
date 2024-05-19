<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_pembelian', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('kode_barang')->constrained('barang');
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pembelian');
    }
};
