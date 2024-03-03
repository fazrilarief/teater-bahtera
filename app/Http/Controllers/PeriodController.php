<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::all();
        return view('pages.admin.periode.period', compact('periods'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $month = $request->input('month');
        $startYear = $request->input('start_year');
        $endYear = $request->input('end_year');
        $semester = $request->input('semester');

        $periode = $month . '-' . $startYear . '/' . $endYear . '-' . $semester;

        $data = [
            'periode' => $periode,
        ];

        Period::create($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periode = Period::findOrFail($id);

        $delete = $periode->delete();

        if ($delete) {
            return redirect()->back();
        }
    }
}
