<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Exports\MembersExport;
use App\Imports\MembersImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Passing data berdasarkan model
        $members = Member::all();
        return view('pages.admin.data-anggota.member', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.data-anggota.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        // validasi data berdasrkan FormRequest
        $validated = $request->validated();

        // Generate Member Code
        $lastMember = Member::orderBy('id', 'desc')->first();
        $validated['member_code'] = 'A' . ($lastMember ? ($lastMember->id + 1) : 1);

        // Passing data ke database
        $member = Member::create($validated);

        // Validasi apakah proses berjalan dengan baik atau tidak
        if ($member) {
            Alert::success('Success', 'Berhasil Menambahkan Data');
            return redirect()->route('data-anggota.member');
        }

        return abort(500);
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
    public function update(MemberRequest $request, $id)
    {
        $validated = $request->validated();

        // Temukan member berdasarkan ID
        $member = Member::findOrFail($id);

        // Periksa apakah member ditemukan
        if (!$member) {
            return abort(404); // Member tidak ditemukan, tampilkan halaman 404
        }

        // Update member
        $update = $member->update($validated);

        // Periksa apakah pembaruan berhasil
        if ($update) {
            Alert::success('Success', 'Berhasil Merubah Data');
            return redirect()->route('data-anggota.member');
        } else {
            return abort(500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Mencari ID
            $delete = Member::findOrFail($id);

            // Menghapus data
            $delete->delete();

            // Jika berhasil dihapus, redirect atau berikan pesan sukses
            Alert::success('Success', 'Berhasil Menghapus Data');
            return redirect()->route('data-anggota.member');
        } catch (QueryException $e) {
            // Tangkap exception ketika ada konstrain foreign key
            if ($e->errorInfo[1] == 1451) {
                // Custom pesan error untuk konstrain foreign key
                Alert::error('Error', 'Data sudah diberi penilaian, hapus penilaian untuk menghapus data ini.');
                return redirect()->route('data-anggota.member');
            } else {
                // Handle exception lain jika diperlukan
                Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
                return redirect()->back();
            }
        }
    }

    /**
     * Export File
     */
    public function export()
    {
        return Excel::download(new MembersExport, 'Data Aggota Teater Bahtera - ' . now()->format('Y-m-d H:i:s') . '.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataAnggota', $namaFile);

        Excel::import(new MembersImport, public_path('DataAnggota/' . $namaFile));
        return redirect()->back();
    }
}
