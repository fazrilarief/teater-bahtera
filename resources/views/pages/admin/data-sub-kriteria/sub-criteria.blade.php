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
            {{-- Vokal Sub Criteria --}}
            <div class="card shadow-lg mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropSubKriteria"
                                href="{{ route('data-kriteria.form') }}" class="btn btn-primary">
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
                                    <td rowspan="100">Vokal (C1)</td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Tidak Lantang</td>
                                    <td>1</td>
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
                                <tr>
                                    <td>2.</td>
                                    <td>Cukup Lantang</td>
                                    <td>2</td>
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
                                <tr>
                                    <td>3.</td>
                                    <td>Lantang</td>
                                    <td>3</td>
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
                                <tr>
                                    <td>4.</td>
                                    <td>Sangat Lantang</td>
                                    <td>4</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Vokal Sub Criteria Ends --}}

            {{-- Artikulasi Sub Criteria --}}
            <div class="card shadow-lg mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropSubKriteria"
                                href="{{ route('data-kriteria.form') }}" class="btn btn-primary">
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
                                    <td rowspan="100">Artikulasi (C2)</td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Tidak Jelas</td>
                                    <td>1</td>
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
                                <tr>
                                    <td>2.</td>
                                    <td>Cukup Jelas</td>
                                    <td>2</td>
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
                                <tr>
                                    <td>3.</td>
                                    <td>Jelas</td>
                                    <td>3</td>
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
                                <tr>
                                    <td>4.</td>
                                    <td>Sangat Jelas</td>
                                    <td>4</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Artikulasi Sub Criteria Ends --}}

            {{-- Intonasi Sub Criteria --}}
            <div class="card shadow-lg mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropSubKriteria"
                                href="{{ route('data-kriteria.form') }}" class="btn btn-primary">
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
                                    <td rowspan="100">Intonasi (C3)</td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Tidak Sesuai</td>
                                    <td>2</td>
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
                                <tr>
                                    <td>2.</td>
                                    <td>Sesuai</td>
                                    <td>4</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Intonasi Sub Criteria Ends --}}

            {{-- Gesture Sub Criteria --}}
            <div class="card shadow-lg mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropSubKriteria"
                                href="{{ route('data-kriteria.form') }}" class="btn btn-primary">
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
                                    <td rowspan="100">Gesture (C4)</td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Kaku</td>
                                    <td>2</td>
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
                                <tr>
                                    <td>2.</td>
                                    <td>Natural</td>
                                    <td>4</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Gesture Sub Criteria Ends --}}

            {{-- Kehadiran Sub Criteria --}}
            <div class="card shadow-lg mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropSubKriteria"
                                href="{{ route('data-kriteria.form') }}" class="btn btn-primary">
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
                                    <td rowspan="100">Kehadiran (C5)</td>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Tidak Pernah</td>
                                    <td>0</td>
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
                                <tr>
                                    <td>2.</td>
                                    <td>Jarang</td>
                                    <td>1</td>
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
                                <tr>
                                    <td>3.</td>
                                    <td>Kadang-Kadang</td>
                                    <td>4</td>
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
                                <tr>
                                    <td>4.</td>
                                    <td>Sering</td>
                                    <td>3</td>
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
                                <tr>
                                    <td>5.</td>
                                    <td>Selalu</td>
                                    <td>4</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Kehadiran Sub Criteria Ends --}}
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="staticBackdropSubKriteria" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropSubKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary">
                <div class="modal-content">
                    <form action="#">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Sub Kriteria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kriteria</label>
                                        <input type="text" name="name" class="form-control" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nilai Bobot</label>
                                        <input type="text" name="name" class="form-control" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('data-sub-kriteria.sub-criteria') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
