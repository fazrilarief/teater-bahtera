<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Http\Requests\CriteriaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();

        $totalBobotNilai = $criterias->sum('bobot_nilai');

        return view('pages.admin.data-kriteria.criteria', compact('criterias', 'totalBobotNilai'));
    }

    public function store(CriteriaRequest $request)
    {
        $validated = $request->validated();

        try {
            $create = Criteria::create($validated);

            if ($create) {
                Alert::success('Success', 'Berhasil Menambahkan Data');
                return redirect()->route('data-kriteria.criteria');
            } else {
                return abort(500);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Error', 'Code sudah digunakan');
            return redirect()->back();
        }
    }


    public function update(CriteriaRequest $request, $id)
    {
        $validated = $request->validated();

        $criteria = Criteria::findOrFail($id);
        if (!$criteria) {
            return abort(404);
        }

        $update = $criteria->update($validated);
        if ($update) {
            Alert::success('Success', 'Berhasil Merubah Data');
            return redirect()->route('data-kriteria.criteria');
        } else {
            return redirect()->back()->withInput()->withErrors('Update data gagal.');
        }
    }

    public function destroy(String $id)
    {
        $delete = Criteria::findOrFail($id);

        $delete->delete();

        if ($delete) {
            Alert::Warning('Warning', 'Berhasil Menghapus Data');
            return redirect()->route('data-kriteria.criteria');
        } else {
            return abort(500); // Pesan kesalahan spesifik
        }
    }
}
