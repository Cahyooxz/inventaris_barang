<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InventarisBarangExport implements FromCollection, WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::Leftjoin('data_pembelian','data_pembelian.kode_barang','=','barang.kode_barang')
        ->Leftjoin('data_pemakaian','data_pemakaian.kode_barang','=','barang.kode_barang')
        ->Leftjoin('users','users.id','=','data_pemakaian.pemakai')
        ->leftJoin('ruangan','ruangan.id','=','data_pemakaian.ruang_id')
        ->select('barang.kode_barang','barang.jenis_barang','barang.jumlah',DB::raw("DATE_FORMAT(data_pembelian.created_at, '%Y-%m-%d') as tanggal_pembelian"),'data_pemakaian.tanggal as tanggal_pemakaian','users.name','ruangan.nama_ruangan')->get();
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
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A:G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
