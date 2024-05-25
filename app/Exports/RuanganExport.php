<?php

namespace App\Exports;

use App\Models\Ruangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class RuanganExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ruangan::select('id','nama_ruangan')->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Ruangan',
        ];
    }
    public function title(): string
    {
        return 'Data Ruangan';
    }
}
