<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventarisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::join('data_pembelian','data_pembelian.kode_barang','=','barang.kode_barang')
        ->join('data_pemakaian','data_pemakaian.kode_barang','=','barang.kode_barang')
        ->leftJoin('ruangan','ruangan.id','=','data_pemakaian.ruang_id')
        ->select('barang.kode_barang','barang.jenis_barang','barang.jumlah',Barang::raw("DATE_FORMAT(data_pembelian.created_at, '%Y-%m-%d') as tanggal_pembelian"),'data_pemakaian.tanggal as tanggal_pemakaian','data_pemakaian.pemakai','data_pemakaian.ruang_id')->get();
    }
    public function headings(): array
    {
        return [
            'Kode Barang',
            'Jenis Barang',
            'Jumlah Barang',
            'Tanggal Pembelian',
            'Tanggal Pemakaian',
            'Nama Pemakai',
            'Ruangan',
        ];
    }
}
