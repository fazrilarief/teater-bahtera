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
                                <div class="row">
                                    <div class="col d-flex gap-2">
                                        <form action="{{ route('download.pdf') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Export to .pdf">
                                                <i class="align-middle" data-feather="file-text"></i> Download .pdf
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-primary" data-bs-placement="top"
                                            data-bs-title="Push Hasil Ranking ke Telegram Anggota" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            <i class="align-middle" data-feather="bell"></i> Push Notifikasi
                                        </button>
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
                                    <select name="template" id="template" class="form-select" onchange="updateTextarea()">
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
