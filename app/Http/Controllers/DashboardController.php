<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Member;
use App\Models\Period;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $resultPeriod = Result::all();

        $totalMember = Member::all()->count('members_name');
        $totalCriteria = Criteria::all()->count('criteria_name');
        $totalPeriod = Period::all()->count('periode');
        $totalSubCriteria = SubCriteria::all()->count('members_name');
        return view('pages.admin.index', compact('resultPeriod', 'totalMember', 'totalCriteria', 'totalPeriod', 'totalSubCriteria'));
    }
}
