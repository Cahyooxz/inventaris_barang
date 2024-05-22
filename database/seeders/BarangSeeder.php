<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = Barang::create([
            'kode_barang' => 'K-001',
            'nama_barang' => 'Kompor',
            'jenis_barang' => 'Peralatan Rumah Tangga',
            'merk' => 'Cap Kaki Nyamuk',
            'harga' => 1000,
            'jumlah' => 10,
        ]);
    }
}
