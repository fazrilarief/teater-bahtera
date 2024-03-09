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
                        <div class="col-lg-2 col-sm-12">
                            <h1 class="card-title mb-2">Hasil Ranking</h1>
                        </div>
                        <div class="col-lg-10 col-sm-12 d-flex justify-content-end">
                            @can('adminAndCoach')
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 d-flex justify-content-end gap-2">
                                        <form action="{{ route('download.pdf') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-nowrap" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Export to .pdf">
                                                <i class="align-middle" data-feather="file-text"></i> Download .pdf
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-primary text-nowrap" data-bs-placement="top"
                                            data-bs-title="Push Hasil Ranking ke Telegram Anggota" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            <i class="align-middle" data-feather="bell"></i> Push Notifikasi
                                        </button>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 d-flex justify-content-end mt-2">
                                        <form action="{{ route('perankingan.rank') }}" method="GET"
                                            class="d-flex text-nowrap">
                                            @csrf
                                            <select name="periode" id="periode" class="form-select rounded-none">
                                                <option selected value="none">Pilih Periode</option>
                                                @foreach ($periods as $period)
                                                    <option value="{{ $period->periode }}"> {{ $period->periode }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn-filter btn btn-success"><i class="align-middle"
                                                    data-feather="search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endcan

                            @can('member')
                                <div class="row">
                                    <div class="col-sm-12 d-flex gap-2">
                                        <div class="filter-data">
                                            <form action="{{ route('perankingan.rank') }}" method="GET"
                                                class="d-flex text-nowrap">
                                                @csrf
                                                <select name="periode" id="periode" class="form-select rounded-none">
                                                    <option disabled selected value="none">Pilih Periode</option>
                                                    @foreach ($periods as $period)
                                                        <option value="{{ $period->periode }}">
                                                            {{ $period->periode }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn-filter btn btn-success"><i
                                                        class="align-middle" data-feather="search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                <th>Periode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->member->member_code }}</td>
                                    <td>{{ $result->members_name }}</td>
                                    <td><span class="badge bg-success">{{ $result->result }}</span></td>
                                    <td><span class="badge bg-primary">{{ $loop->iteration }}</span></td>
                                    <td><span class="badge bg-warning">{{ $result->period }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    {{-- Modal Send Report --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Kirim Hasil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sendMessage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file" class="form-label">Document</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="template" class="form-label">Template</label>
                                    <select name="template" id="template" class="form-select"
                                        onchange="updateTextarea()">
                                        <option selected disabled>Pilih Template</option>
                                        <option value="report">Report</option>
                                        <option value="kustom">Kustom Pesan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="footer" class="form-label">Oleh</label>
                                    <input type="text" name="footer" class="form-control"
                                        value="--Regrads, {{ auth()->user()->username . '--' }}" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateTextarea() {
            let templateSelect = document.getElementById("template");
            let messageTextarea = document.getElementById("message");
            let selectedTemplate = templateSelect.value;

            switch (selectedTemplate) {
                case "report":
                    messageTextarea.value =
                        `🏆 Hore! Report perankingan sudah siap!Yuk, simak pencapaian hebat tim kita. Teruskan semangatnya! 💪\n\nForm feedback kepelatihan : \n`;
                    break;
                case "kustom":
                    // Biarkan textarea kosong untuk template kustom
                    messageTextarea.value = "";
                    break;
                default:
                    // Biarkan textarea kosong jika tidak ada template yang dipilih
                    messageTextarea.value = "";
                    break;
            }
        }
    </script>
@endsection
