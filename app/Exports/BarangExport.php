<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all('kode_barang','nama_barang','jenis_barang','merk','jumlah','harga');
    }
    public function headings(): array{
        return [
            'kode_barang',
            'nama_barang',
            'jenis_barang',
            'merk',
            'jumlah',
            'harga',
        ];
    }
}
