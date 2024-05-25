<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InventarisExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        return[
            'Data User' => new UsersExport(),
            'Data Ruangan' => new RuanganExport(),
            'Data Barang' => new BarangExport(),
            'Data Pembelian' => new PembelianExport(),
            'Data Pemakaian' => new PemakaianExport(),
        ];
    }
}
