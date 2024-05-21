<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPembelian extends Model
{
    use HasFactory;

    protected $table = 'data_pembelian';

    protected $fillable = [
        'kode_barang',
        'jumlah',
        'harga',
        'total',
    ];
}
