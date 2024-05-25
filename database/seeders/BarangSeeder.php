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
            'harga' => 200000,
            'jumlah' => 0,
        ]);
        $barang_2 = Barang::create([
            'kode_barang' => 'K-002',
            'nama_barang' => 'Televisi',
            'jenis_barang' => 'Elektronik',
            'merk' => 'Samsung',
            'harga' => 3000000,
            'jumlah' => 0,
        ]);
        $barang_3 = Barang::create([
            'kode_barang' => 'K-003',
            'nama_barang' => 'Pensil',
            'jenis_barang' => 'Alat Tulis',
            'merk' => 'Faber Casstle',
            'harga' => 4000,
            'jumlah' => 0,
        ]);
    }
}
