<?php

namespace App\Exports;

use App\Models\BarangPembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PembelianExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangPembelian::join('barang', 'barang.kode_barang', '=', 'data_pembelian.kode_barang')
        ->select('barang.nama_barang','barang.merk','data_pembelian.jumlah','data_pembelian.harga','data_pembelian.total')
        ->get();;
    }

    public function headings(): array
    {
        return [
            'nama barang',
            'merk barang',
            'jumlah barang',
            'harga barang',
            'total harga barang',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A:E')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D:E')->getNumberFormat()->setFormatCode('#,##0');
        // size sesuai value
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}