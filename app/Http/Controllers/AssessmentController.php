<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\Assessment;
use RealRashid\SweetAlert\Facades\Alert;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data dari tabel Assessment dengan beberapa kolom tertentu
        $assessments = Assessment::select(
            'assessments.id as id',
            'members.id as member_id',
            'criterias.id as criteria_id',
            'sub_criterias.id as sub_criteria_id',
            'members.member_name as member_name',
            'criterias.criteria_name as criteria_name',
            'sub_criterias.sub_criteria_name as sub_criteria_name'
        )
            // Melakukan operasi LEFT JOIN dengan tabel members
            ->leftJoin('members', 'members.id', '=', 'assessments.members_id')
            // Melakukan operasi LEFT JOIN dengan tabel criterias
            ->leftJoin('criterias', 'criterias.id', '=', 'assessments.criterias_id')
            // Melakukan operasi LEFT JOIN dengan tabel sub_criterias
            ->leftJoin('sub_criterias', 'sub_criterias.id', '=', 'assessments.sub_criterias_id')
            // Mengambil seluruh data hasil operasi di atas dan juga eager loading
            ->with('member', 'criteria', 'subCriteria')
            ->get();

        // Mengambil seluruh data dari tabel Member
        $members = Member::get();

        // Mengambil seluruh data dari tabel Criteria
        $criterias = Criteria::get();

        // Mengambil seluruh data dari tabel SubCriteria
        $subCriterias = SubCriteria::get();

        $assessments = Assessment::with('criteria', 'subCriteria')->get();

        // Mengarahkan ke view 'alternative.index' dengan menyertakan data-data hasil query di atas
        // Data ini juga disertakan variabel 'i' dengan nilai 0
        return view('pages.admin.penilaian-alternatif.assessment', compact('assessments', 'members', 'criterias', 'subCriterias'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi request
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'criteria' => 'required|array',
        // Tambahkan validasi lainnya sesuai kebutuhan
    ]);

    // Check if the member_id has already been assessed
    $existingAssessment = Assessment::where('members_id', $request->input('member_id'))->first();

    if ($existingAssessment) {
        // Member_id has already been assessed, show warning message
        Alert::warning('Warning', 'Nama ini sudah diberi penilaian!');
        return redirect()->route('penilaian-alternatif.assessment');
    }

    // Looping untuk menyimpan nilai berdasarkan kriteria dan sub-kriteria yang dipilih
    foreach ($request->input('criteria') as $criteriaId => $subCriteriaId) {
        // Validasi kriteria dan sub-kriteria
        // Pastikan sesuai dengan aturan validasi yang dibutuhkan

        // Dapatkan nama kriteria dan sub-kriteria
        $criteriaName = Criteria::find($criteriaId)->criteria_name;
        $subCriteriaName = SubCriteria::find($subCriteriaId)->sub_criteria_name;

        // Simpan nilai ke database
        $assessment = new Assessment([
            'members_id' => $request->input('member_id'),
            'criterias_id' => $criteriaId,
            'sub_criterias_id' => $subCriteriaId,
            'criteria_name' => $criteriaName,
            'sub_criteria_name' => $subCriteriaName,
        ]);
        $assessment->save();
    }

    // Redirect dengan pesan sukses
    if ($assessment) {
        Alert::success('Success', 'Penilaian berhasil ditambahkan');
        return redirect()->route('penilaian-alternatif.assessment');
    } else {
        Alert::warning('Warning', 'Nama ini sudah diberi penilaian!');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'member_id' => 'required',
            'criteria' => 'required|array',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Hapus nilai penilaian yang sudah ada untuk anggota tersebut
        Assessment::where('members_id', $request->member_id)->delete();

        // Looping untuk menyimpan nilai berdasarkan kriteria dan sub-kriteria yang dipilih
        foreach ($request->input('criteria') as $criteriaId => $subCriteriaId) {
            // Dapatkan nama kriteria dan sub-kriteria
            $criteriaName = Criteria::find($criteriaId)->criteria_name;
            $subCriteriaName = SubCriteria::find($subCriteriaId)->sub_criteria_name;

            // Simpan nilai ke database
            $assessment = new Assessment([
                'members_id' => $request->input('member_id'),
                'criterias_id' => $criteriaId,
                'sub_criterias_id' => $subCriteriaId,
                'criteria_name' => $criteriaName,
                'sub_criteria_name' => $subCriteriaName,
            ]);
            $assessment->save();
        }

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
