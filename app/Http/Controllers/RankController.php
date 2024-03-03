<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Period;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RankController extends Controller
{
    public function index()
    {
        // Memanggil semua data result
        // $results = Result::with(['member'])->orderBy('result', 'DESC')->get();

        // Filter data berdasarkan periodenya
        $results = Result::where('period', request('periode'))->get();

        // Memanggil semua data period
        $periods = Period::all();

        return view('pages.admin.perankingan.rank', compact('results', 'periods'));
    }

    public function downloadPdf()
    {
        $results = Result::get();

        $data = [
            'periode' => date('m'),
            'date' => date('d/m/y'),
            'results' => $results,
        ];

        $pdf = Pdf::loadView('pages.admin.pdf.resultPdf', $data)
            ->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('a4');

        $date = date('my');
        return $pdf->download('T-TRA' . $date . '-' . 'Rekapitulasi Nilai Anggota.pdf');
    }
}
