<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Member;
use App\Models\Criteria;
use App\Models\Result;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel Assessment dengan beberapa kolom tertentu
        $assessments = Assessment::with(['member', 'criteria', 'subCriteria'])->get();

        // Mengambil data dari table Member
        $members = Member::all();

        // Mengambil data dari table Member
        $results = Result::all();

        // Mengambil data dari table Criteria
        $criterias = Criteria::all();
        $totalBobotNilai = $criterias->sum('criteria_value');
        $totalBobotNormalisasi = $criterias->sum('normalisasi');

        return view('pages.admin.perhitungan.calculation', compact('assessments', 'members', 'criterias', 'results', 'totalBobotNilai', 'totalBobotNormalisasi'));
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

    public function calculateResult()
    {
        // Mengambil data dari tabel Members
        $members = Member::all();

        // Mengambil data dari tabel Criterias
        $criterias = Criteria::all();

        foreach ($members as $member) {
            $nilaiAkhir = 0;

            foreach ($criterias as $criteria) {
                // Mendapatkan nilai Xuc dari tabel Assessments
                $xuc = Assessment::where('members_id', $member->id)
                    ->where('criteria_name', $criteria->criteria_name)
                    ->value('utility_value');

                // Mendapatkan nilai Xnc dari tabel Criterias
                $xnc = $criteria->normalisasi;

                // Menghitung nilaiC = Xuc * Xnc
                $nilaiC = $xuc * $xnc;

                // Menambahkan nilaiC ke nilaiAkhir
                $nilaiAkhir += $nilaiC;
            }

            // Mencari atau membuat objek Result berdasarkan members_id
            $result = Result::firstOrNew(['members_id' => $member->id]);

            // Menyimpan nilaiAkhir ke dalam objek Result
            $result->members_name = $member->member_name;
            $result->result = $nilaiAkhir;

            // Menyimpan objek Result ke dalam tabel Results
            $result->save();
        }

        return redirect()->back()->with('success', 'Nilai akhir berhasil dihitung.');
    }
}
