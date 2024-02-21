<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RankController extends Controller
{
    public function index()
    {
        $results = Result::with(['member'])->orderBy('result', 'DESC')->get();

        return view('pages.admin.perankingan.rank', compact('results'));
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
        return $pdf->download('T-TRA' . $date . '-' . 'Rekapitulasi Nilai Anggota.pdf' );
    }
}
