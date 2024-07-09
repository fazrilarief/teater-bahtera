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
                        <span property="name">Periode Perhitungan</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Tambahkan Data Periode</div>
                        <div class="card-body">
                            <form action="{{ route('periode.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    {{-- <label for="period" class="form-label">Periode</label> --}}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="month" class="form-label">Bulan</label>
                                            <select name="month" name="month" id="month" class="form-select"
                                                autofocus required>
                                                <option disabled selected>Pilih Bulan</option>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    <option value='{{ $i }}'>
                                                        Bulan {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="start_year" class="form-label">Tahun Mulai</label>
                                            <input type="number" name="start_year" id="start_year" class="form-control"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="end_year" class="form-label">Tahun Akhir</label>
                                            <input type="number" name="end_year" id="end_year" class="form-control"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="semester" class="form-label">Semester</label>
                                            <select name="semester" name="semester" id="semester" class="form-select"
                                                required>
                                                <option disabled selected>Pilih Semester</option>
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="text-danger">
                        *Input bulan saat periode ini akan digunakan
                        <br>
                        *Input tahun awal dan tahun akhir sesuai dengan tahun ajaran yang sedang dijalankan
                        <br>
                        *Input semester sesuai dengan semester tahun ajaran yang sedang dijalankan
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Data Periode</div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp

                                    @foreach ($periods as $period)
                                        <tr>
                                            <td>{{ $loop->iteration . '.' }}</td>
                                            <td>{{ $period->periode }}</td>
                                            <td>{{ Carbon::parse($period->created_at)->format('d/m/Y h:i:s A') }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end gap-2">
                                                        <form action="{{ route('periode.destroy', $period->id_period) }}"
                                                            onsubmit="return confirm('Data akan dihapus?')" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="align-middle" data-feather="trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
