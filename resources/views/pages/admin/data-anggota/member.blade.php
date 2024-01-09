@extends('layouts.admin.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-primary">
                                <i class="align-middle" data-feather="plus"></i> Tambah Data
                            </a>
                        </div>
                        <div class="col-6 d-flex justify-content-end gap-2">
                            <a href="#" class="btn btn-success">
                                <i class="align-middle" data-feather="arrow-down-circle"></i> Export
                            </a>
                            <a href="#" class="btn btn-info">
                                <i class="align-middle" data-feather="arrow-up-circle"></i> Import
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Struktur</th>
                                <th>Minat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. </td>
                                <td>Fazril Arief Nugraha</td>
                                <td>232410396</td>
                                <td>0082328786</td>
                                <td>Wanita</td>
                                <td>12 Mia 2</td>
                                <td>Pengurus</td>
                                <td>Akting</td>
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
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
