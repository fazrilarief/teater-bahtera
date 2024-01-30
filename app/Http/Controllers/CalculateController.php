<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Member;
use App\Models\Criteria;
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

        return view('pages.admin.perhitungan.calculation', compact('assessments', 'members', 'criterias'));
    }
}
