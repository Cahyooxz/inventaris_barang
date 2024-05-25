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
        static::creating(function ($barang) {
            // mengambil kode barang terakhir
            $lastBarang = Barang::orderBy('id', 'desc')->first();
            $nextNumber = 1;

            if ($lastBarang) {
                // membuat auto increment setiap pembuatan data barang berdasarkan data terakhir
                $lastKode = $lastBarang->kode_barang;
                $lastNumber = intval(substr($lastKode, 2));
                $nextNumber = $lastNumber + 1;
            }

            // Format baru kode_barang, *example K-001
            $barang->kode_barang = 'K-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        });
        
        static::updated(function ($barang) {
            if ($barang->isDirty('harga')) {
                $pembelian = BarangPembelian::where('kode_barang', $barang->kode_barang)->first();
                if(!$pembelian !== null){
                    $pembelian->update([
                        'harga' => $barang->harga,
                        'total' => $barang->harga * $pembelian->jumlah,
                    ]);
                }
            }
        });
    }
}
