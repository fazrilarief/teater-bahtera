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
                    <a class="c-navigation-breadcrumbs__link" href="{{ route('data-anggota.member') }}">
                        <span property="name">Data Anggota</span>
                    </a>
                </li>

                <span class="me-2"> // </span>

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active" href="#">
                        <span property="name">Tambah Data</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb ends --}}

        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="card-header">
                    <h2 class="fw-bold">Tambah Data</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('data-anggota.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="member_name" class="form-control" autofocus
                                        value="{{ old('name') }}">
                                    @error('member_name')
                                        <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                                data-feather="alert-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Pria" {{ old('gender') == 'Pria' ? 'selected' : '' }}>Pria</option>
                                        <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : '' }}>Wanita
                                        </option>
                                    </select>
                                </div>
                                @error('gender')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="number" id="nis" name="nis" class="form-control"
                                        placeholder="3412*******" minlength="0" maxlength="13" value="{{ old('nis') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" id="nisn" name="nisn" class="form-control"
                                        placeholder="006*******" minlength="0" maxlength="10" value="{{ old('nisn') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="whatsapp" class="form-label">No Whatsapp</label>
                                    <input type="number" id="whatsapp" name="whatsapp" class="form-control"
                                        placeholder="08821313148" value="{{ old('whatsapp') }}">
                                </div>
                                @error('whatsapp')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="ucok21@gmail.com"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="birthday" class="form-control"
                                        value="{{ old('birthday') }}">
                                </div>
                                @error('birthday')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="grade" class="form-label">Kelas</label>
                                    <select name="grade" id="grade" class="form-select">
                                        <option selected disabled>Pilih Kelas</option>
                                        <option value="10" {{ old('grade') == '10' ? 'selected' : '' }}>10</option>
                                        <option value="11" {{ old('grade') == '11' ? 'selected' : '' }}>11</option>
                                        <option value="12" {{ old('grade') == '12' ? 'selected' : '' }}>12</option>
                                    </select>
                                </div>
                                @error('grade')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="major" class="form-label">Jurusan</label>
                                    <select name="major" id="major" class="form-select">
                                        <option selected disabled>Pilih Jurusan</option>
                                        <option value="MIA/IPA" {{ old('major') == 'MIA/IPA' ? 'selected' : '' }}>MIA /
                                            IPA</option>
                                        <option value="IIS/IPS" {{ old('major') == 'IIS/IPS' ? 'selected' : '' }}>IIS /
                                            IPS</option>
                                        <option value="Bahasa" {{ old('major') == 'Bahasa' ? 'selected' : '' }}>Bahasa
                                        </option>
                                        <option value="Belum Memiliki Jurusan"
                                            {{ old('major') == 'Belum Memiliki Jurusan' ? 'selected' : '' }}>Belum Memiliki
                                            Jurusan
                                        </option>
                                    </select>
                                </div>
                                @error('major')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="class_code" class="form-label">Kode Kelas</label>
                                    <select name="class_code" id="class-code" class="form-select">
                                        <option selected disabled>Pilih Kode Kelas</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('class_code') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('class_code')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="structure" class="form-label">Kepanitiaan</label>
                                    <select name="structure" id="grade" class="form-select">
                                        <option selected disabled>Jabatan</option>
                                        <option value="Anggota" {{ old('structure') == 'Anggota' ? 'selected' : '' }}>
                                            Anggota
                                        </option>
                                        <option value="Pengurus" {{ old('structure') == 'Pengurus' ? 'selected' : '' }}>
                                            Pengurus
                                        </option>
                                    </select>
                                </div>
                                @error('structure')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="interest" class="form-label">Minat Seni</label>
                                    <select name="interest" id="grade" class="form-select">
                                        <option selected disabled>Pilih Minat Seni</option>
                                        <option value="Puisi" {{ old('interest') == 'Puisi' ? 'selected' : '' }}>Puisi
                                        </option>
                                        <option value="Menulis" {{ old('interest') == 'Menulis' ? 'selected' : '' }}>
                                            Menulis</option>
                                        <option value="Akting" {{ old('interest') == 'Akting' ? 'selected' : '' }}>Akting
                                        </option>
                                        <option value="Monolog" {{ old('interest') == 'Monolog' ? 'selected' : '' }}>
                                            Monolog</option>
                                    </select>
                                </div>
                                @error('interest')
                                    <div class="alert alert-danger p-1" role="alert"><i class="align-middle"
                                            data-feather="alert-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('data-anggota.member') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
