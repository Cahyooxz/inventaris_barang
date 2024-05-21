<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangPembelian;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jenis_barang',
        'merk',
        'jumlah',
        'harga',
    ];
    protected static function booted()
    {
        static::updated(function ($barang) {
            if ($barang->isDirty('harga')) {
                $pembelian = BarangPembelian::where('kode_barang', $barang->kode_barang)->first();

                $pembelian->update([
                    'harga' => $barang->harga,
                    'total' => $barang->harga * $pembelian->jumlah,
                ]);
            }
        });
    }
}
