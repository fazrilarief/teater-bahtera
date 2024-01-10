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
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
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
                                <th>Jenis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>C1</td>
                                <td>Vokal</td>
                                <td>15</td>
                                <td>Benefit</td>
                                <td>
                                    <div class="text-nowrap">
                                        <div class="btn btn-info btn-sm">
                                            <i class="align-middle" data-feather="eye"></i>
                                        </div>
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
                                <td>C2</td>
                                <td>Artikulasi</td>
                                <td>20</td>
                                <td>Benefit</td>
                                <td>
                                    <div class="text-nowrap">
                                        <div class="btn btn-info btn-sm">
                                            <i class="align-middle" data-feather="eye"></i>
                                        </div>
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
                                <td>C3</td>
                                <td>Intonasi</td>
                                <td>20</td>
                                <td>Benefit</td>
                                <td>
                                    <div class="text-nowrap">
                                        <div class="btn btn-info btn-sm">
                                            <i class="align-middle" data-feather="eye"></i>
                                        </div>
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
                                <td>C4</td>
                                <td>Gesture</td>
                                <td>20</td>
                                <td>Benefit</td>
                                <td>
                                    <div class="text-nowrap">
                                        <div class="btn btn-info btn-sm">
                                            <i class="align-middle" data-feather="eye"></i>
                                        </div>
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
                                <td>C5</td>
                                <td>Kehadiran</td>
                                <td>25</td>
                                <td>Benefit</td>
                                <td>
                                    <div class="text-nowrap">
                                        <div class="btn btn-info btn-sm">
                                            <i class="align-middle" data-feather="eye"></i>
                                        </div>
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
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <td>100</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary">
                <div class="modal-content">
                    <form action="#">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kriteria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="class-code" class="form-label">Kode Kriteria</label>
                                        <select name="class-code" id="class-code" class="form-select">
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
                            <a href="{{ route('data-kriteria.criteria') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
