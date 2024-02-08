<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Member;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel Assessment dengan beberapa kolom tertentu
        $assessments = Assessment::with(['member', 'criteria', 'subCriteria'])->get();

        // Mengambil data dari table Member
        $members = Member::all();

        // Mengambil data dari table Criteria
        $criterias = Criteria::all();
        $totalBobotNilai = $criterias->sum('criteria_value');
        $totalBobotNormalisasi = $criterias->sum('normalisasi');

        return view('pages.admin.perhitungan.calculation', compact('assessments', 'members', 'criterias', 'totalBobotNilai', 'totalBobotNormalisasi'));
    }

    public function calculateUtility()
    {
        $assessments = Assessment::all();

        foreach ($assessments as $assessment) {
            $xij = $assessment->sub_criteria_value;
            $category = $assessment->category;
            $criteriaName = $assessment->criteria_name;

            // Pastikan $category dan $criteriaName ada sebelum menggunakan kondisi
            if (isset($category, $criteriaName)) {
                // Melakukan perhitungan nilai utility berdasarkan kategori
                $xjmin = Assessment::where('criteria_name', $criteriaName)
                    ->where('category', $category)
                    ->min('sub_criteria_value');

                $xjmax = Assessment::where('criteria_name', $criteriaName)
                    ->where('category', $category)
                    ->max('sub_criteria_value');

                // Pastikan $xjmax dan $xjmin tidak null, dan $xjmin tidak sama dengan $xij
                if ($xjmax !== null && $xjmin !== null) {
                    // Menyimpan nilai utility ke dalam tabel assessments
                    if ($category === 'Benefit') {
                        $utility = ($xij - $xjmin) / ($xjmax - $xjmin);
                    } else {
                        $utility = ($xjmax - $xij) / ($xjmax - $xjmin);
                    }

                    // Menyimpan data ke database
                    $assessment->utility_value = $utility;
                    $assessment->save();
                }
            }
        }

        return redirect()->back();
    }
}
