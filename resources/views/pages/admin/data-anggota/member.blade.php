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
                        <span property="name">Data Anggota</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb ends --}}

        {{-- Main Content --}}
        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('data-anggota.form') }}" class="btn btn-primary">
                                <i class="align-middle" data-feather="plus"></i> Tambah Data
                            </a>
                        </div>
                        <div class="col-6 d-flex justify-content-end gap-2">
                            <a href="{{ route('data-anggota.export') }}" class="btn btn-success">
                                <i class="align-middle" data-feather="arrow-down-circle"></i> Export
                            </a>
                            <a href="#" class="btn btn-info">
                                <i class="align-middle" data-feather="arrow-up-circle"></i> Import
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table id="myTable" class="table table-responsive table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Code</th>
                                <th>NISN</th>
                                <th>Gender</th>
                                <th>Kelas</th>
                                <th>Struktur</th>
                                <th>Minat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                                use Carbon\Carbon;
                            @endphp
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $number++ }} </td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->code }}</td>
                                    <td>{{ $member->nisn }}</td>
                                    <td>{{ $member->gender }}</td>
                                    <td>{{ $member->grade . ' ' . $member->major . ' ' . $member->class_code }}</td>
                                    <td>{{ $member->structure }}</td>
                                    <td>{{ $member->interest }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#lihatData{{ $member->id }}">
                                                    <i class="align-middle" data-feather="eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editData{{ $member->id }}">
                                                    <i class="align-middle" data-feather="edit"></i>
                                                </button>
                                                <form action="{{ route('data-anggota.destroy', $member->id) }}"
                                                    method="POST" onsubmit="return confirm('Data akan dihapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal Lihat Data --}}
                                <div class="modal fade" id="lihatData{{ $member->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel{{ $member->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $member->id }}">
                                                    <strong>Lihat Data :</strong> {{ $member->name }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Nama</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->name }}</dd>

                                                    <dt class="col-sm-3">Jenis Kelamin</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->gender }}</dd>

                                                    <dt class="col-sm-3">Code</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->code }}</dd>

                                                    <dt class="col-sm-3">NIS</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->nis }}</dd>

                                                    <dt class="col-sm-3">NISN</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->nisn }}</dd>

                                                    <dt class="col-sm-3">Whatsapp</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->whatsapp }}</dd>

                                                    <dt class="col-sm-3">E-Mail</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->email }}</dd>

                                                    <dt class="col-sm-3">Tanggal Lahir</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">
                                                        {{ Carbon::parse($member->birthday)->format('d/m/Y') }}
                                                    </dd>

                                                    <dt class="col-sm-3">Kelas</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">
                                                        {{ $member->grade . ' ' . $member->major . ' ' . $member->class_code }}
                                                    </dd>

                                                    <dt class="col-sm-3">Struktur</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->structure }}</dd>

                                                    <dt class="col-sm-3">Minat Seni</dt>
                                                    <dt class="col-sm-1">:</dt>
                                                    <dd class="col-sm-8">{{ $member->interest }}</dd>

                                                    <dt class="col-sm-3 text-success">Created at</dt>
                                                    <dt class="col-sm-1 text-success">:</dt>
                                                    <dd class="col-sm-8 text-success">
                                                        {{ Carbon::parse($member->created_at)->format('d/m/Y') }} /
                                                        {{ $member->created_at->diffforhumans() }}
                                                    </dd>

                                                    <dt class="col-sm-3 text-warning">Updated</dt>
                                                    <dt class="col-sm-1 text-warning">:</dt>
                                                    <dd class="col-sm-8 text-warning">
                                                        {{ Carbon::parse($member->updated_at)->format('d/m/Y') }} /
                                                        {{ $member->updated_at->diffforhumans() }}
                                                    </dd>
                                                </dl>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Lihat Data Ends --}}

                                {{-- Modal Edit Data --}}
                                <div class="modal fade" id="editData{{ $member->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel{{ $member->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $member->id }}">
                                                    <strong>Edit Data :</strong> {{ $member->name }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('data-anggota.update', $member->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">
                                                                    Nama Lengkap
                                                                </label>
                                                                <input type="text" name="name" class="form-control"
                                                                    autofocus value="{{ old('name', $member->name) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gender" class="form-label">
                                                                    Jenis Kelamin
                                                                </label>
                                                                <select name="gender" id="gender"
                                                                    class="form-select">
                                                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                                                    <option value="Pria"
                                                                        {{ old('gender', $member->gender) == 'Pria' ? 'selected' : '' }}>
                                                                        Pria
                                                                    </option>
                                                                    <option value="Wanita"
                                                                        {{ old('gender', $member->gender) == 'Wanita' ? 'selected' : '' }}>
                                                                        Wanita
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nis" class="form-label">NIS</label>
                                                                <input type="number" name="nis" class="form-control"
                                                                    placeholder="3412*******" required
                                                                    value="{{ old('nis', $member->nis) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nisn" class="form-label">NISN</label>
                                                                <input type="number" name="nisn" class="form-control"
                                                                    placeholder="006*******" required
                                                                    value="{{ old('nisn', $member->nisn) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="whatsapp" class="form-label">
                                                                    No Whatsapp
                                                                </label>
                                                                <input type="number" name="whatsapp"
                                                                    class="form-control" placeholder="08821313148"
                                                                    value="{{ old('whatsapp', $member->whatsapp) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="ucok21@gmail.com" required
                                                                    value="{{ old('email', $member->email) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="birthday" class="form-label">Tanggal
                                                                    Lahir</label>
                                                                <input type="date" name="birthday"
                                                                    class="form-control" required
                                                                    value="{{ old('birthday', isset($member) ? Carbon::parse($member->birthday)->format('Y-m-d') : '') }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="grade" class="form-label">Kelas</label>
                                                                <select name="grade" id="grade"
                                                                    class="form-select">
                                                                    <option selected disabled>Pilih Kelas</option>
                                                                    <option value="10"
                                                                        {{ old('grade', $member->grade) == '10' ? 'selected' : '' }}>
                                                                        10</option>
                                                                    <option value="11"
                                                                        {{ old('grade', $member->grade) == '11' ? 'selected' : '' }}>
                                                                        11</option>
                                                                    <option value="12"
                                                                        {{ old('grade', $member->grade) == '12' ? 'selected' : '' }}>
                                                                        12</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="major" class="form-label">Jurusan</label>
                                                                <select name="major" id="major"
                                                                    class="form-select">
                                                                    <option selected disabled>Pilih Jurusan</option>
                                                                    <option value="MIA / IPA"
                                                                        {{ old('major', $member->major) == 'MIA / IPA' ? 'selected' : '' }}>
                                                                        MIA / IPA</option>
                                                                    <option value="IIS / IPS"
                                                                        {{ old('major', $member->major) == 'IIS / IPS' ? 'selected' : '' }}>
                                                                        IIS / IPS</option>
                                                                    <option value="Bahasa"
                                                                        {{ old('major', $member->major) == 'Bahasa' ? 'selected' : '' }}>
                                                                        Bahasa</option>
                                                                    <option value="Belum Memiliki Jurusan"
                                                                        {{ old('major', $member->major) == 'Belum Memiliki Jurusan' ? 'selected' : '' }}>
                                                                        Belum Memiliki Jurusan
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="class_code" class="form-label">Kode
                                                                    Kelas</label>
                                                                <select name="class_code" id="class-code"
                                                                    class="form-select">
                                                                    <option selected disabled>Pilih Kode Kelas</option>
                                                                    @for ($i = 1; $i <= 10; $i++)
                                                                        <option value="{{ $i }}"
                                                                            {{ old('class_code', $member->class_code) == $i ? 'selected' : '' }}>
                                                                            {{ $i }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="interest" class="form-label">Minat
                                                                    Seni</label>
                                                                <select name="interest" id="grade"
                                                                    class="form-select">
                                                                    <option selected disabled>Pilih Minat Seni</option>
                                                                    <option value="Puisi"
                                                                        {{ old('interest', $member->interest) == 'Puisi' ? 'selected' : '' }}>
                                                                        Puisi</option>
                                                                    <option value="Menulis"
                                                                        {{ old('interest', $member->interest) == 'Menulis' ? 'selected' : '' }}>
                                                                        Menulis</option>
                                                                    <option value="Akting"
                                                                        {{ old('interest', $member->interest) == 'Akting' ? 'selected' : '' }}>
                                                                        Akting</option>
                                                                    <option value="Monolog"
                                                                        {{ old('interest', $member->interest) == 'Monolog' ? 'selected' : '' }}>
                                                                        Monolog</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="structure"
                                                                    class="form-label">Kepanitiaan</label>
                                                                <select name="structure" id="grade"
                                                                    class="form-select">
                                                                    <option selected disabled>Jabatan</option>
                                                                    <option value="Anggota"
                                                                        {{ old('structure', $member->structure) == 'Anggota' ? 'selected' : '' }}>
                                                                        Anggota</option>
                                                                    <option value="Pengurus"
                                                                        {{ old('structure', $member->structure) == 'Pengurus' ? 'selected' : '' }}>
                                                                        Pengurus</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="pt-3">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <a href="{{ route('data-anggota.member') }}"
                                                                class="btn btn-danger">Batal</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Edit Data Ends --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Main Content Ends --}}
    </main>
@endsection
