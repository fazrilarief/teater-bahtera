<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Member([
            'member_name' => $row[1],
            'gende' => $row[2],
            'member_code' => $row[3],
            'nis' => $row[4],
            'nisn' => $row[5],
            'whatsapp' => $row[6],
            'email' => $row[7],
            'birthday' => $row[8],
            'grade' => $row[9],
            'major' => $row[10],
            'class_code' => $row[11],
            'structure' => $row[12],
            'interest' => $row[13],
        ]);
    }
}
