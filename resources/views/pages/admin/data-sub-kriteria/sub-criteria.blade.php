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
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active"
                        href="{{ route('data-sub-kriteria.sub-criteria') }}">
                        <span property="name">Data Sub Kriteria</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb ends --}}

        <div class="container-fluid pt-0 mt-4">
            {{-- Card Sub Criteria --}}
            @forelse ($criterias as $criteria)
                <div class="card shadow-lg mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#tambahData{{ $criteria->id }}" href="{{ route('data-kriteria.form') }}"
                                    class="btn btn-primary">
                                    <i class="align-middle" data-feather="plus"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="card-body table-responsive">
                            <table class="table table-responsive table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>Nama Kriteria</th>
                                        <th>No</th>
                                        <th>Nama Sub Kriteria</th>
                                        <th>Bobot Nilai</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="100">
                                            {{ $criteria->criteria_name . ' ' . '(' . $criteria->criteria_code . ')' }}</td>
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($subCriterias as $subCriteria)
                                        @if ($subCriteria->criterias_id === $criteria->id)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $subCriteria->sub_criteria_name }}</td>
                                                <td>{{ $subCriteria->sub_criteria_value }}</td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <div class="btn btn-warning btn-sm">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </div>
                                                        <div class="btn btn-danger btn-sm">
                                                            <i class="align-middle" data-feather="trash"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Modal Tambah Sub Kriteria --}}
                <div class="modal fade" id="tambahData{{ $criteria->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropSubKriteriaLabel{{ $criteria->id }}" aria-hidden="true">
                    <div class="modal-dialog bg-primary">
                        <div class="modal-content">
                            <form action="{{ route('data-sub-criteria.store') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel{{ $criteria->id }}">
                                        Sub Kriteria untuk : <strong>{{ $criteria->criteria_name }}</strong>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="criterias_id" class="form-label">ID Kriteria</label>
                                                <input type="number" name="criterias_id" class="form-control"
                                                    value="{{ $criteria->id }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sub_criteria_name" class="form-label">Nama Sub Kriteria</label>
                                                <input type="text" name="sub_criteria_name" class="form-control"
                                                    autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sub_criteria_value" class="form-label">Nilai Bobot</label>
                                                <input type="number" name="sub_criteria_value" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal Tambah Sub Kriteria Ends --}}

                {{-- Modal Edit Sub Kriteria --}}
                <div class="modal fade" id="tambahData{{ $criteria->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropSubKriteriaLabel{{ $criteria->id }}" aria-hidden="true">
                    <div class="modal-dialog bg-primary">
                        <div class="modal-content">
                            <form action="{{ route('data-sub-criteria.store') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel{{ $criteria->id }}">
                                        Sub Kriteria untuk : <strong>{{ $criteria->criteria_name }}</strong>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="criterias_id" class="form-label">ID Kriteria</label>
                                                <input type="number" name="criterias_id" class="form-control"
                                                    value="{{ $criteria->id }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sub_criteria_name" class="form-label">Nama Sub
                                                    Kriteria</label>
                                                <input type="text" name="sub_criteria_name" class="form-control"
                                                    autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sub_criteria_value" class="form-label">Nilai Bobot</label>
                                                <input type="number" name="sub_criteria_value" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Modal Edit Sub Kriteria Ends --}}
            @empty
                <div class="card shadow-lg mt-4">
                    <div class="card-body">
                        <h5 class="text-muted">Data Kriteria Masing Kosong....</h5>
                    </div>
                </div>
            @endforelse
            {{-- Card Sub Criteria Ends --}}
        </div>
    </main>
@endsection
