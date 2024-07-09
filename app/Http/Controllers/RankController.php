<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use App\Models\Period;
use App\Models\Result;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RankController extends Controller
{
    public function index()
    {
        // Filter data berdasarkan periodenya
        $ranks = Result::where('period', request('periode'))->with(['member'])->orderBy('result', 'DESC')->get();

        // Menyimpan value filter periode
        if (request('periode')) {
            session()->put('periode', request('periode'));
        }

        // Memanggil semua data period
        $periods = Period::all();

        return view('pages.admin.perankingan.rank', compact('ranks', 'periods'));
    }

    public function downloadPdf(Request $request)
    {
        // Ambil nilai periode dari session
        $periode = session()->get('periode');
        // Mengirim data ke view "download PDF"
        $ranks = Result::where('period', $periode)->get();
        // Menampung tanggal
        $date = date('d/m/y');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('pages.admin.pdf.resultPdf', compact('ranks', 'periode', 'date')));
        $mpdf->Output('T-TRA' . '-' . '[' . $periode . ']' . '-' . 'Rekapitulasi Nilai Anggota.pdf', 'D');
    }
}
