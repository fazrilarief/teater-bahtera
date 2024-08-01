<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Member;
use App\Models\Criteria;
use App\Models\Rank;
use App\Models\Result;
use App\Models\Period;
use Illuminate\Http\Request;
Use Alert;

class CalculateController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel Assessment dengan beberapa kolom tertentu
        $assessments = Assessment::with(['member', 'criteria', 'subCriteria'])->get();

        // Mengambil data dari tabel Member
        $members = Member::all();

        // Mengambil data dari tabel Member
        $results = Result::all();

        // Memanggil data dari tabel periode
        $periods = Period::all();

        // Mengambil data dari table Criteria
        $criterias = Criteria::all();
        $totalBobotNilai = $criterias->sum('criteria_value');
        $totalBobotNormalisasi = $criterias->sum('normalisasi');

        return view('pages.admin.perhitungan.calculation', compact('assessments', 'members', 'criterias', 'results', 'periods', 'totalBobotNilai', 'totalBobotNormalisasi'));
    }

    public function calculateUtility()
    {
        $assessments = Assessment::all();

        foreach ($assessments as $assessment) {
            $Cout = $assessment->sub_criteria_value;
            $category = $assessment->category;
            $criteriaName = $assessment->criteria_name;

            // Pastikan $category dan $criteriaName ada sebelum menggunakan kondisi
            if (isset($category, $criteriaName)) {
                // Melakukan perhitungan nilai utility berdasarkan kategori
                $Cmin = Assessment::where('criteria_name', $criteriaName)
                    ->where('category', $category)
                    ->min('sub_criteria_value');

                $Cmax = Assessment::where('criteria_name', $criteriaName)
                    ->where('category', $category)
                    ->max('sub_criteria_value');

                // Pastikan $Cmax dan $Cmin tidak null, dan $Cmin tidak sama dengan $Cout
                if ($Cmax !== null && $Cmin !== null) {
                    // Menghitung nilai utility
                    if ($category === 'Benefit') {
                        $utility = ($Cout - $Cmin) / ($Cmax - $Cmin);
                    } else {
                        $utility = ($Cmax - $Cout) / ($Cmax - $Cmin);
                    }

                    // Menyimpan data ke database
                    $assessment->utility_value = $utility;
                    $assessment->save();
                }
            }
        }

        if ($assessment) {
            Alert::success('Success', 'Berhasil menghitung nilai utility!');
            return redirect()->back();
        }
    }

    public function calculateResult(Request $request)
    {
        // Mengambil data dari tabel Members
        $members = Member::all();

        // Mengambil data dari tabel Criterias
        $criterias = Criteria::all();

        // Mengambil inputan user untuk periode
        $period = $request->input('periode');

        foreach ($members as $member) {
            $nilaiAkhir = 0;

            foreach ($criterias as $criteria) {
                // Mendapatkan nilai ujAi dari tabel Assessments
                $ujAi = Assessment::where('members_id', $member->id_member)
                    ->where('criteria_name', $criteria->criteria_name)
                    ->value('utility_value');

                // Mendapatkan nilai wj dari tabel Criterias
                $wj = $criteria->normalisasi;

                // Menghitung nilaiC = ujAi * wj
                $nilaiC = $ujAi * $wj;

                // Menambahkan nilaiC ke nilaiAkhir
                // $nilaiAkhir += $nilaiC * $wj;
                $nilaiAkhir += $nilaiC++;
            }

            // Mencari atau membuat objek Result berdasarkan members_id
            $result = Result::firstOrNew([
                'id_member' => $member->id_member,
                'period' => $period,
            ]);

            $memberClass = $member->grade . " " . $member->major . " " . $member->class_code;

            // Menyimpan nilaiAkhir ke dalam objek Result
            $result->member_name = $member->member_name;
            $result->member_code = $member->member_code;
            $result->member_class = $memberClass;
            $result->result = $nilaiAkhir;

            // Menyimpan objek Result ke dalam tabel Results
            $result->save();
        }

        if ($result) {
            Alert::success('Success', 'Berhasil menghitung nilai akhir!');
            return redirect()->back();
        }

    }
}
