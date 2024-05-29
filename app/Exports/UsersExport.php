<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersExport implements FromCollection, WithHeadings,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id','username','name','email','role')->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'username',
            'name',
            'email',
            'role',
        ];
    }
    public function title() : string{
        return 'Data Users';
    }
}
