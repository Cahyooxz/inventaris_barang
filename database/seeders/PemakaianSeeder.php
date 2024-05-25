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
            'ruang_id' => '1',
            'jumlah' => 10,
        ]);
        $barang->update([
            'jumlah' => $barang->jumlah - 10,
        ]);
        
        $barang_2 = Barang::where('kode_barang','K-002')->first();
        $data = Pemakaian::create([
            'kode_barang' => 'K-002',
            'pemakai' => '2',
            'tanggal' => '2024-06-06',
            'ruang_id' => '1',
            'jumlah' => 5,
        ]);
        $barang_2->update([
            'jumlah' => $barang_2->jumlah - 5,
        ]);
        
        $barang_3 = Barang::where('kode_barang','K-003')->first();
        $data = Pemakaian::create([
            'kode_barang' => 'K-003',
            'pemakai' => '1',
            'tanggal' => '2024-06-06',
            'ruang_id' => '1',
            'jumlah' => 3,
        ]);
        $barang_3->update([
            'jumlah' => $barang_3->jumlah - 3,
        ]);
    }
}
