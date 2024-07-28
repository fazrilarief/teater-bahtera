@extends('layouts.admin.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between gap-2">
                                <div
                                    class="card col-4 border border-4 border-top-0 border-start-0 border-end-0 border-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Anggota</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{ $totalMember }}</h1>
                                    </div>
                                </div>
                                <div
                                    class="card col-4 border border-4 border-top-0 border-start-0 border-end-0 border-success">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Kriteria</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        <i class="align-middle" data-feather="square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{ $totalCriteria }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card col-4 border border-4 border-top-0 border-start-0 border-end-0 border-warning">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Periode</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="stat text-primary">
                                                        <i class="align-middle" data-feather="calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3">{{ $totalPeriod }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Penilaian Periode Terakhir</h5>
                        </div>
                        <table class="table table-hover my-0 text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="d-none d-xl-table-cell">Kode Alternatif</th>
                                    <th class="d-none d-xl-table-cell text-start">Nama</th>
                                    <th class="d-none d-xl-table-cell">Nilai Akhir</th>
                                    <th>Ranking</th>
                                    <th class="d-none d-md-table-cell">Periode</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultPeriod as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $item->kode_alternatif }}</td>
                                        <td class="d-none d-xl-table-cell text-start">{{ $item->members_name }}</td>
                                        <td><span class="badge bg-success">{{ $item->result }}</span></td>
                                        <td><span class="badge bg-primary">{{ $loop->iteration }}</span></td>
                                        <td><span class="badge bg-warning">{{ $item->period }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                    <div class="card flex-fill ">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Calendar</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="chart">
                                    <div id="datetimepicker-dashboard"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
