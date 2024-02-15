<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class MembersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Member::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Gender',
            'Code',
            'NIS',
            'NISN',
            'Whatsapp',
            'E-Mail',
            'Birthday',
            'Grade',
            'Major',
            'Class Code',
            'Structure',
            'Interest',
            'deleted_at',
            'created_at',
            'updated_at',
        ];
    }
}
