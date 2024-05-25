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
        Schema::create('data_pemakaian', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang')->onDelete('cascade');
            $table->unsignedBigInteger('pemakai');
            $table->foreign('pemakai')->references('id')->on('users');
            $table->foreignId('ruang_id')->nullable()
            ->constrained('ruangan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemakaian');
    }
};
