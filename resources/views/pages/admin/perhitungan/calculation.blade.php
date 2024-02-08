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
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active"
                        href="{{ route('perhitungan.value-calculation') }}">
                        <span property="name">Perhitungan</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">

            {{-- Nilai Data Alternatif --}}
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4>Nilai Data Alternatif</h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kode Alternatif</th>
                                @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->criteria_code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration . '.' }}</td>
                                    <td>{{ $member->member_name }}</td>
                                    <td>{{ $member->member_code }}</td>
                                    @foreach ($criterias as $criteria)
                                        <td>
                                            @foreach ($assessments as $assessment)
                                                @if ($assessment->members_id === $member->id && $assessment->criterias_id === $criteria->id)
                                                    {{ $assessment->sub_criteria_value }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Nilai Data Alternatif Ends --}}

            {{-- Bobot Kriteria --}}
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Bobot Kriteria</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-responsive table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($criterias as $criteria)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $criteria->criteria_code }}</td>
                                            <td>{{ $criteria->criteria_name }}</td>
                                            <td>{{ $criteria->criteria_value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td class="fw-bold">{{ $totalBobotNilai }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Normalisasi Bobot Kriteria</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-responsive table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Normalisasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($criterias as $criteria)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $criteria->criteria_code }}</td>
                                            <td>{{ $criteria->criteria_name }}</td>
                                            <td>{{ $criteria->criteria_value }}</td>
                                            <td class="fw-bold">{{ $criteria->normalisasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td class="fw-bold">{{ $totalBobotNilai }}</td>
                                        <td class="fw-bold">{{ $totalBobotNormalisasi }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Bobot Kriteria Ends --}}

            {{-- Nilai Utility --}}
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h4>Nilai Utility</h4>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            {{-- Tombol untuk melakukan perhitungan dan menyimpan nilai utility --}}
                            <form action="{{ route('hitung.utility') }}" method="get">
                                @csrf

                                <button type="submit" class="btn btn-success">
                                    Hitung Utility <i class="align-middle" data-feather='chevrons-right'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable1" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alternatif</th>
                                <th>Kode Alternatif</th>
                                @foreach ($criterias as $criteria)
                                    <th>{{ $criteria->criteria_code }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $loop->iteration . '.' }}</td>
                                    <td>{{ $member->member_name }}</td>
                                    <td>{{ $member->member_code }}</td>
                                    @foreach ($criterias as $criteria)
                                        <td class="fw-bold">
                                            @foreach ($assessments as $assessment)
                                                @if ($assessment->members_id === $member->id && $assessment->criterias_id === $criteria->id)
                                                    {{ $assessment->utility_value ?? 'N/A' }}
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Nilai Utility Ends --}}

            {{-- Hasil Akhir --}}
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h4>Nilai Utility</h4>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            {{-- Tombol untuk melakukan perhitungan dan menyimpan nilai utility --}}
                            <form action="" method="">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    Hitung Nilai Akhir <i class="align-middle" data-feather='chevrons-right'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable2" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alternatif</th>
                                <th>Kode Alternatif</th>
                                <th>Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Fazril Arief Nugraha</td>
                                <td>A1</td>
                                <td class="fw-bold">0.036</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Hasil Akhir Ends --}}

        </div>
    </main>
@endsection
