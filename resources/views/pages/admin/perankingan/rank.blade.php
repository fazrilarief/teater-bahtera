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
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active" href="{{ route('perankingan.rank') }}">
                        <span property="name">Perankingan</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="card-title mb-0">Hasil Ranking</h1>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            @can('adminAndCoach')
                                <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Push Hasil Ranking ke Telegram Anggota">
                                    <i class="align-middle" data-feather="bell"></i> Push Notifikasi
                                </button>
                            @endcan
                        </div>
                    </div>

                </div>
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Alternatif</th>
                                <th>Nama</th>
                                <th>Nilai Akhir</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->member->member_code }}</td>
                                    <td>{{ $result->members_name }}</td>
                                    <td class="fw-bold">{{ $result->result }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
