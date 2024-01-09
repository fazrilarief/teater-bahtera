@extends('layouts.admin.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2 class="fw-bold">Tambah Data</h2>
                </div>
                <div class="card-body">
                    <form action="#">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-select">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="number" name="nis" class="form-control" placeholder="3412*******"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="number" name="nisn" class="form-control" placeholder="006*******"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="whatsapp" class="form-label">No Whatsapp</label>
                                    <input type="number" name="whatsapp" class="form-control" placeholder="08821313148">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="ucok21@gmail.com"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="birthday_date" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="birthday_date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="grade" class="form-label">Kelas</label>
                                    <select name="grade" id="grade" class="form-select">
                                        <option selected disabled>Pilih Kelas</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="major" class="form-label">Jurusan</label>
                                    <select name="major" id="major" class="form-select">
                                        <option selected disabled>Pilih Jurusan</option>
                                        <option value="MIA / IPA">MIA / IPA</option>
                                        <option value="IIS / IPS">IIS / IPS</option>
                                        <option value="Bahasa">Bahasa</option>
                                        <option value="Belum Memiliki Jurusan">Belum Memiliki Jurusan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="class-code" class="form-label">Kode Kelas</label>
                                    <select name="class-code" id="class-code" class="form-select">
                                        <option selected disabled>Pilih Kode Kelas</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="interest" class="form-label">Minat Seni</label>
                                    <select name="interest" id="grade" class="form-select">
                                        <option selected disabled>Pilih Minat Seni</option>
                                        <option value="Puisi">Puisi</option>
                                        <option value="Menulis">Menulis</option>
                                        <option value="Akting">Akting</option>
                                        <option value="Monolog">Monolog</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="pt-3">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{ route('data-anggota.member') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
