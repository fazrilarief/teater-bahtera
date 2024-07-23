@extends('layouts.admin.app')

@section('content')
    <main class="content">
        {{-- Breadrcumb --}}
        <nav class="c-navigation-breadcrumbs">
            <ol class="c-navigation-breadcrumbs__directory">

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link" href="javscript:;">
                        <span property="name">Perhitungan SMART</span>
                    </a>
                </li>

                <span class="me-2"> // </span>

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active" href="{{ route('data-anggota.member') }}">
                        <span property="name">Penilaian Alternatif</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-header">
                    <h1 class="card-title mb-0">Penilaian</h1>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kelas</th>

                                @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->criteria_name }}</th>
                                @endforeach

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration }} </td>
                                    <td>{{ $member->member_code }}</td>
                                    <td>{{ $member->member_name }}</td>
                                    <td>{{ $member->grade . ' ' . $member->major . ' ' . $member->class_code }}</td>

                                    @foreach ($criterias as $criteria)
                                        <td class="fw-bold">
                                            @foreach ($assessments as $assessment)
                                                @if ($assessment->members_id === $member->id_member && $assessment->criterias_id === $criteria->id_criteria)
                                                    {{ $assessment->sub_criteria_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach

                                    <td>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end gap-2">
                                                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#nilaiAlternatif{{ $member->id_member }}">
                                                    <i class="align-middle" data-feather="edit"></i> Nilai
                                                </button>
                                                {{-- <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editNilaiAlternatif{{ $member->id_member }}">
                                                    <i class="align-middle" data-feather="eye"></i> Edit
                                                </button> --}}
                                                <form action="{{ route('assessment.destroy', $member->id_member) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="align-middle" data-feather="trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                    </td>
                                </tr>

                                {{-- Modal Nilai Alterntaif --}}
                                <div class="modal fade" id="nilaiAlternatif{{ $member->id_member }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="nilaiAlternatifLabel{{ $member->id_member }}" aria-hidden="true">
                                    <div class="modal-dialog bg-primary">
                                        <div class="modal-content">
                                            <form action="{{ route('assessment.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="nilaiAlternatifLabel{{ $member->id_member }}">
                                                        Nilai Anggota : <strong>{{ $member->member_name }}</strong>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" name="member_id"
                                                                value="{{ $member->id_member }}">
                                                            <input type="hidden" name="member_name"
                                                                value="{{ $member->member_name }}">
                                                            <input type="hidden" name="member_code"
                                                                value="{{ $member->member_code }}">
                                                            @foreach ($criterias as $criteria)
                                                                <div class="mb-3">
                                                                    <label for="criteria[{{ $criteria->id_criteria }}]"
                                                                        class="form-label">
                                                                        {{ $criteria->criteria_name }}
                                                                    </label>
                                                                    <select name="criteria[{{ $criteria->id_criteria }}]"
                                                                        id="criteria[{{ $criteria->id_criteria }}]"
                                                                        class="form-select">
                                                                        <option selected disabled>.....</option>
                                                                        @php
                                                                            $res = $subCriterias
                                                                                ->where(
                                                                                    'criterias_id',
                                                                                    $criteria->id_criteria,
                                                                                )
                                                                                ->all();
                                                                        @endphp
                                                                        @foreach ($res as $subCriteria)
                                                                            <option
                                                                                value="{{ $subCriteria->id_sub_criteria }}">
                                                                                {{ $subCriteria->sub_criteria_name . ' | ' . ' Nilai : ' . $subCriteria->sub_criteria_value }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endforeach
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
                                {{-- Modal Nilai Alterntaif Ends --}}

                                {{-- Modal Edit Nilai Alterntaif --}}
                                {{-- <div class="modal fade" id="editNilaiAlternatif{{ $member->id_member }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="editNilaiAlternatifLabel{{ $member->id_member }}" aria-hidden="true">
                                    <div class="modal-dialog bg-primary">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('assessment.update', ['assessment' => $member->id_member]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="editNilaiAlternatifLabel{{ $member->id_member }}">
                                                        Edit Nilai : <strong>{{ $member->member_name }}</strong>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="hidden" name="member_id"
                                                                value="{{ $member->id_member }}">
                                                            @foreach ($criterias as $criteria)
                                                                <div class="mb-3">
                                                                    <label for="criteria[{{ $criteria->id_criteria }}]"
                                                                        class="form-label">
                                                                        {{ $criteria->criteria_name }}
                                                                    </label>
                                                                    <select name="criteria[{{ $criteria->id_criteria }}]"
                                                                        id="criteria[{{ $criteria->id_criteria }}]"
                                                                        class="form-select">
                                                                        <option value="" disabled>.....</option>
                                                                        @foreach ($subCriterias->where('criterias_id', $criteria->id_criteria) as $subCriteria)
                                                                            <option
                                                                                value="{{ $subCriteria->id_sub_criteria }}"
                                                                                @foreach ($groupedAssessments[$member->id_member] ?? [] as $assessment)
                                                                                    {{ old('criteria.' . $criteria->id_criteria, $assessment->sub_criterias_id ?? '') == $subCriteria->id_sub_criteria ? 'selected' : '' }} @endforeach>
                                                                                {{ $subCriteria->sub_criteria_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- Modal Edit Nilai Alterntaif Ends --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
@endsection
