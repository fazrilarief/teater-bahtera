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
        // Filter data pdi database
        $latestResult = Result::orderBy('period', 'desc')->first();
        // Panggil ke view
        if ($latestResult) {
            // Filter data di database berdasarkan period
            $latestPeriod = $latestResult->period;
            $resultPeriod = Result::where('period', $latestPeriod)->orderBy('result', 'desc')->get();
        } else {
            // Jika tidak ada data tampilin ini
            $resultPeriod = Result::all();
        }
        // Menghitung total member
        $totalMember = Member::all()->count('members_name');
        // Menghitung total criteria
        $totalCriteria = Criteria::all()->count('criteria_name');
        // Menghitung total priod
        $totalPeriod = Period::all()->count('periode');
        // Panggil variabel ke view
        return view('pages.admin.index', compact('resultPeriod', 'totalMember', 'totalCriteria', 'totalPeriod'));
    }
}
