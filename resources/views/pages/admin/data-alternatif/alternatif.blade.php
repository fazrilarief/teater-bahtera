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
                        <span property="name">Data Alternatif</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. </td>
                                <td>Fazril Arief Nugraha</td>
                                <td>Wanita</td>
                                <td>12 Mia 2</td>
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
    </main>
@endsection
