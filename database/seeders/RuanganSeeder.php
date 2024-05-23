<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruangan::updateOrCreate([
            'nama_ruangan' => 'Ruangan 5A',
        ]);
        Ruangan::updateOrCreate([
            'nama_ruangan' => 'Ruangan 2D',
        ]);
        Ruangan::updateOrCreate([
            'nama_ruangan' => 'Ruangan 1C',
        ]);
    }
}
