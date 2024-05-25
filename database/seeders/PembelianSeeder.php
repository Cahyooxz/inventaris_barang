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
            'harga' =>200000,
            'total' => 200000 * 20,
        ]);
        $barang->update([
            'jumlah' => $barang->jumlah + 20,
        ]);

        $barang_2 = Barang::where('kode_barang','K-002')->first();
        $data = BarangPembelian::create([
            'kode_barang' => 'K-002',
            'jumlah' => 10,
            'harga' =>3000000,
            'total' => 3000000 * 10,
        ]);
        $barang_2->update([
            'jumlah' => $barang_2->jumlah + 10,
        ]);
        
        $barang_3 = Barang::where('kode_barang','K-003')->first();
        $data = BarangPembelian::create([
            'kode_barang' => 'K-003',
            'jumlah' => 10,
            'harga' =>4000,
            'total' => 4000 * 10,
        ]);
        $barang_3->update([
            'jumlah' => $barang_3->jumlah + 10,
        ]);
    }
}
