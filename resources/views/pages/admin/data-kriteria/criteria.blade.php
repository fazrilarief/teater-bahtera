@extends('layouts.admin.app')

@section('content')
    <main class="content">
        {{-- Breadrcumb --}}
        <nav class="c-navigation-breadcrumbs">
            <ol class="c-navigation-breadcrumbs__directory">

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link" href="javscript:;">
                        <span property="name">Master Data</span>
                    </a>
                </li>

                <span class="me-2"> // </span>

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active" href="{{ route('data-anggota.member') }}">
                        <span property="name">Data Kriteria</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb ends --}}

        <div class="container-fluid pt-0 mt-4">
            <div class="card shadow-lg">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header">
                    <h1 class="card-title mb-0">Data Kriteria</h1>
                </div>
                <div class="card-header pt-0">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahData"
                                href="{{ route('data-kriteria.form') }}" class="btn btn-primary">
                                <i class="align-middle" data-feather="plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>kode</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot Nilai</th>
                                <th>Normalisasi</th>
                                <th>Jenis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($criterias as $criteria)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $criteria->criteria_code }}</td>
                                    <td>{{ $criteria->criteria_name }}</td>
                                    <td>{{ $criteria->criteria_value }}</td>
                                    <td>{{ $criteria->normalisasi }}</td>
                                    <td>{{ $criteria->category }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end gap-2">
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editData{{ $criteria->id_criteria }}">
                                                    <i class="align-middle" data-feather="edit"></i>
                                                </button>
                                                <form action="{{ route('data-kriteria.destroy', $criteria->id_criteria) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Data akan dihapus?')">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal Edit Data --}}
                                <div class="modal fade" id="editData{{ $criteria->id_criteria }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel{{ $criteria->id_criteria }}" aria-hidden="true">
                                    <div class="modal-dialog bg-primary">
                                        <div class="modal-content">
                                            <form action="{{ route('data-kriteria.update', $criteria->id_criteria) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="staticBackdropLabel{{ $criteria->id_criteria }}">
                                                        <strong>Edit : </strong>{{ $criteria->criteria_name }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="criteria_code" class="form-label">Kode
                                                                    Kriteria</label>
                                                                <select name="criteria_code" class="form-select">
                                                                    <option selected disabled>Pilih Kode Kriteria</option>
                                                                    <option value="C1"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C1' ? 'selected' : '' }}>
                                                                        C1
                                                                    </option>
                                                                    <option value="C2"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C2' ? 'selected' : '' }}>
                                                                        C2
                                                                    </option>
                                                                    <option value="C3"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C3' ? 'selected' : '' }}>
                                                                        C3
                                                                    </option>
                                                                    <option value="C4"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C4' ? 'selected' : '' }}>
                                                                        C4
                                                                    </option>
                                                                    <option value="C5"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C5' ? 'selected' : '' }}>
                                                                        C5
                                                                    </option>
                                                                    <option value="C6"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C6' ? 'selected' : '' }}>
                                                                        C6
                                                                    </option>
                                                                    <option value="C7"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C7' ? 'selected' : '' }}>
                                                                        C7
                                                                    </option>
                                                                    <option value="C8"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C8' ? 'selected' : '' }}>
                                                                        C8
                                                                    </option>
                                                                    <option value="C9"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C9' ? 'selected' : '' }}>
                                                                        C9
                                                                    </option>
                                                                    <option value="C10"
                                                                        {{ old('criteria_code', $criteria->criteria_code) == 'C10' ? 'selected' : '' }}>
                                                                        C10
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="criteria_name" class="form-label">Nama
                                                                    Kriteria</label>
                                                                <input type="text" name="criteria_name"
                                                                    class="form-control"
                                                                    value="{{ old('criteria_name', $criteria->criteria_name) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="criteria_value" class="form-label">Nilai
                                                                    Bobot</label>
                                                                <input type="text" name="criteria_value"
                                                                    class="form-control"
                                                                    value="{{ old('criteria_value', $criteria->criteria_value) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="category" class="form-label">Jenis
                                                                    Kriteria</label>
                                                                <select name="category" id="jenis" class="form-select">
                                                                    <option selected disabled>Pilih Jenis Kriteria</option>
                                                                    <option value="Benefit"
                                                                        {{ old('category', $criteria->category) == 'Benefit' ? 'selected' : '' }}>
                                                                        Benefit</option>
                                                                    <option value="Cost"
                                                                        {{ old('category', $criteria->category) == 'Cost' ? 'selected' : '' }}>
                                                                        Cost
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <a href="{{ route('data-kriteria.criteria') }}"
                                                        class="btn btn-danger">Batal</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <td>{{ $totalBobotNilai }}</td>
                                <td>{{ $totalNormalisasi }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal Tambah Data --}}
        <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary">
                <div class="modal-content">
                    <form action="{{ route('data-kriteria.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kriteria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Kode Kriteria</label>
                                        <select name="criteria_code" id="class-code" class="form-select">
                                            <option selected disabled>Pilih Kode Kriteria</option>
                                            <option value="C1">C1</option>
                                            <option value="C2">C2</option>
                                            <option value="C3">C3</option>
                                            <option value="C4">C4</option>
                                            <option value="C5">C5</option>
                                            <option value="C6">C6</option>
                                            <option value="C7">C7</option>
                                            <option value="C8">C8</option>
                                            <option value="C9">C9</option>
                                            <option value="C10">C10</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kriteria</label>
                                        <input type="text" name="criteria_name" class="form-control" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bobot_nilai" class="form-label">Nilai Bobot</label>
                                        <input type="text" name="criteria_value" class="form-control" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis" class="form-label">Jenis Kriteria</label>
                                        <select name="category" id="jenis" class="form-select">
                                            <option selected disabled>Pilih Jenis Kriteria</option>
                                            <option value="Benefit" {{ old('jenis') == 'Benefit' ? 'selected' : '' }}>
                                                Benefit</option>
                                            <option value="Cost" {{ old('jenis') == 'Cost' ? 'selected' : '' }}>Cost
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('data-kriteria.criteria') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
