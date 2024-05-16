<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'name' => 'Parto',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        $admin->assignRole('admin');

        $operator = User::create([
            'username' => 'operator',
            'name' => 'Andre',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('operator'),
            'role' => 'operator',
        ]);
        $operator->assignRole('operator');

        $petugas = User::create([
            'username' => 'petugas',
            'name' => 'Cahyo',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas'),
            'role' => 'petugas',
        ]);
        $petugas->assignRole('petugas');
    }
}
