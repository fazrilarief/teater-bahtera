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
                                        <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdropAssessment">
                                            <i class="align-middle" data-feather="edit"></i> Nilai
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="staticBackdropAssessment" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropSubKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog bg-primary">
                <div class="modal-content">
                    <form action="#">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Nilai Anggota : Fazril Arief Nugraha</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="vokal" class="form-label">Vokal (C1)</label>
                                        <select name="vokal" id="vokal" class="form-select">
                                            <option selected disabled>.....</option>
                                            <option value="1">1 - Tidak Lantang</option>
                                            <option value="2">2 - Kurang Lantang</option>
                                            <option value="3">3 - Lantang</option>
                                            <option value="4">4 - Sangat Lantang</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="artikulasi" class="form-label">Artikulasi (C2)</label>
                                        <select name="artikulasi" id="artikulasi" class="form-select">
                                            <option selected disabled>.....</option>
                                            <option value="1">1 - Tidak Jelas</option>
                                            <option value="2">2 - Kurang Jelas</option>
                                            <option value="3">3 - Jelas</option>
                                            <option value="4">4 - Sangat Jelas</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="intonasi" class="form-label">Intonasi (C3)</label>
                                        <select name="intonasi" id="intonsai" class="form-select">
                                            <option selected disabled>.....</option>
                                            <option value="2">2 - Tidak Sesuai</option>
                                            <option value="4">4 - Sangat Sesuai</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="gesture" class="form-label">Gesture (C4)</label>
                                        <select name="gesture" id="gesture" class="form-select">
                                            <option selected disabled>.....</option>
                                            <option value="2">2 - Kaku</option>
                                            <option value="4">4 - Natural</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="vocal" class="form-label">Kehadiran (C5)</label>
                                        <select name="kehadiran" id="kehadiran" class="form-select">
                                            <option selected disabled>.....</option>
                                            <option value="0">0 - Tidak Pernah</option>
                                            <option value="1">1 - Jarang</option>
                                            <option value="2">2 - Kadang-Kadang</option>
                                            <option value="3">3 - Sering</option>
                                            <option value="4">4 - Selalu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('penilaian-alternatif.assessment') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
