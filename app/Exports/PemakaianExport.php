<?php

namespace App\Exports;

use App\Models\Pemakaian;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PemakaianExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemakaian::join('barang', 'barang.kode_barang','=','data_pemakaian.kode_barang')
        ->join('users','users.id','=','data_pemakaian.pemakai')
        ->leftJoin('ruangan','ruangan.id','=','data_pemakaian.ruang_id')
        ->select('data_pemakaian.id','barang.nama_barang','barang.merk','users.name','users.role','data_pemakaian.jumlah','data_pemakaian.tanggal','ruangan.nama_ruangan')
        ->get();
    }
    public function headings(): array
    {
        return [
            'Data Pemakaian ID',
            'Nama Barang',
            'Merk Barang',
            'Nama Peminjam',
            'Role Peminjam',
            'Jumlah Pemakaian',
            'Tanggal Pemakaian',
            'Nama Ruangan',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
    public function title() : string{
        return 'Data Pemakaian';
    }
}
