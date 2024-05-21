<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\BarangPembelian;
use App\Models\Pemakaian;

class PemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = Barang::where('kode_barang','K-001')->first();
        $data = Pemakaian::create([
            'kode_barang' => 'K-001',
            'pemakai' => '1',
            'tanggal' => '2024-06-06',
            'jumlah' => 10,
        ]);
        $barang->update([
            'jumlah' => $barang->jumlah - 10,
        ]);
    }
}
