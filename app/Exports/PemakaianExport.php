<?php

namespace App\Exports;

use App\Models\Pemakaian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PemakaianExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    protected $from;
    protected $end;

    public function __construct(Request $request)
    {
        $this->from = $request->input('from');
        $this->end = $request->input('end');
    }

    public function collection()
    {
        $from = $this->from;
        $end = $this->end;
        $query = Pemakaian::join('barang', 'barang.kode_barang', '=', 'data_pemakaian.kode_barang')
            ->join('users', 'users.id', '=', 'data_pemakaian.pemakai')
            ->leftJoin('ruangan', 'ruangan.id', '=', 'data_pemakaian.ruang_id')
            ->select(
                'data_pemakaian.id',
                'barang.nama_barang',
                'barang.merk',
                'users.name',
                'users.role',
                'data_pemakaian.jumlah',
                'data_pemakaian.tanggal',
                'ruangan.nama_ruangan'
            );

        if ($this->from && $this->end) {
            $query->whereBetween('data_pemakaian.tanggal', [$from,$end]);
        }
        return $query->get();
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

        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }

    public function title(): string
    {
        return 'Data Pemakaian';
    }
}
