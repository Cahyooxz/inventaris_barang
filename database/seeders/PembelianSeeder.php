<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\BarangPembelian;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = Barang::where('kode_barang','K-001')->first();
        $data = BarangPembelian::create([
            'kode_barang' => 'K-001',
            'jumlah' => 20,
            'harga' => 9000,
        ]);
        $barang->update([
            'jumlah' => $barang->jumlah + 20,
        ]);
    }
}
