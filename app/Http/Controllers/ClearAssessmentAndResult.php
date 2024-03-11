<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\DB;

class ClearAssessmentAndResult extends Controller
{
    public function clearAssessmentResult()
    {
        // Mendefinisikan closure
        $clear = function () {
            DB::table('assessments')->truncate();
            DB::table('results')->truncate();
        };

        // Memanggil closure
        $clear();

        // Memotong tabel members jika clearAssessmentResult dijalankan
        if ($clear) {
            Alert::success('Sukses', 'Berhasil membersihkan data!');
            DB::table('members')->delete();
        }

        return redirect()->back();
    }
}
