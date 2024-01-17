<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

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
        $validated['code'] = 'A' . ($lastMember ? ($lastMember->id + 1) : 1);

        // Passing data ke database
        $member = Member::create($validated);

        // Validasi apakah proses berjalan dengan baik atau tidak
        if ($member) {
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
        // Mencari ID
        $delete = Member::findOrFail($id);

        // Menghapus data
        $delete->delete();

        // Validasi method $delete
        if ($delete) {
            return redirect()->route('data-anggota.member');
        } else {
            return abort(500); // Pesan kesalahan spesifik
        }
    }
}
