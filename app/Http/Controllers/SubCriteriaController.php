<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubCriteriaRequest;
use App\Models\Criteria;
use App\Models\SubCriteria;
use RealRashid\SweetAlert\Facades\Alert;

class SubCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::all();
        $subCriterias = SubCriteria::with('criteria')->get();
        return view('pages.admin.data-sub-kriteria.sub-criteria', compact('criterias', 'subCriterias'));
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
    public function store(SubCriteriaRequest $request)
    {
        $validated = $request->validated();

        $subCriteria = SubCriteria::create($validated);

        if ($subCriteria) {
            Alert::success('Sukses', 'Data sub kriteria berhasil ditambahkan');
            return redirect()->route('data-sub-kriteria.sub-criteria');
        } else {
            return abort(500);
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
    public function update(SubCriteriaRequest $request, string $id)
    {
        $validated = $request->validated();

        $subCriteria = SubCriteria::findOrFail($id);

        $update = $subCriteria->update($validated);

        if ($update) {
            Alert::success('Sukses', 'Data sudah berhasil diubah');
            return redirect()->route('data-sub-kriteria.sub-criteria');
        } else {
            return abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = SubCriteria::findOrFail($id);

        $delete->delete();

        if ($delete) {
            Alert::warning('Warning', 'Anda baru saja menghapus sebuah data!');
            return redirect()->route('data-sub-kriteria.sub-criteria');
        } else {
            return abort(500);
        }
    }
}
