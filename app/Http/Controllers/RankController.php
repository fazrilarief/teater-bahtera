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
        $results = Result::where('period', request('periode'))->with(['member'])->orderBy('result', 'DESC')->get();

        // Menyimpan value filter periode
        if (request('periode')) {
            session()->put('periode', request('periode'));
        }

        // Memanggil semua data period
        $periods = Period::all();

        return view('pages.admin.perankingan.rank', compact('results', 'periods'));
    }

    public function downloadPdf(Request $request)
    {
        // Ambil nilai periode dari session
        $periode = session()->get('periode');
        // Mengirim data ke view "download PDF"
        $results = Result::where('period', $periode)->get();
        // Menampung tanggal
        $date = date('d/m/y');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('pages.admin.pdf.resultPdf', compact('results', 'periode', 'date')));
        $mpdf->Output('T-TRA' . '-' . '[' . $periode . ']' . '-' . 'Rekapitulasi Nilai Anggota.pdf', 'D');

        // $data = [
        //     'periode' => $periode,
        //     'date' => date('d/m/y'),
        //     'results' => $results,
        // ];

        // $pdf = Pdf::loadView('pages.admin.pdf.resultPdf', $data)
        //     ->setOptions(['defaultFont' => 'sans-serif'])
        //     ->setPaper('a4');
        //     // ->set_option('isRemoteEnabled', TRUE);

        // $date = date('my');
        // return $pdf->download('T-TRA' . $date . '-' . 'Rekapitulasi Nilai Anggota.pdf');
    }
}
