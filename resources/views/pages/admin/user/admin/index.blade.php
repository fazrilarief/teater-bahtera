@extends('layouts.admin.app')

@section('content')
    <main class="content">
        {{-- Breadrcumb --}}
        <nav class="c-navigation-breadcrumbs">
            <ol class="c-navigation-breadcrumbs__directory">

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link" href="javscript:;">
                        <span property="name">User</span>
                    </a>
                </li>

                <span class="me-2"> // </span>

                <li class="c-navigation-breadcrumbs__item">
                    <a class="c-navigation-breadcrumbs__link breadcrumb-active" href="{{ route('user.admin') }}">
                        <span property="name">Data Akses Admin</span>
                    </a>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb Ends --}}

        <div class="container-fluid p-0 mt-4">
            <div class="card shadow-lg">

                @if ($errors->any())
                    <div class="text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-center list-unstyled">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-header">
                    <h1 class="card-title mb-0">Akses Admin</h1>
                </div>
                <div class="card-header pt-0">
                    <div class="row">
                        <div class="col-6">
                            <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambahDataAdmin">
                                <i class="align-middle" data-feather="plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="myTable3" class="table table-bordered table-hover my-0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                use Carbon\Carbon;
                            @endphp
                            @foreach ($users as $user)
                                @if ($user->role == 'admin')
                                    <tr>
                                        <td>{{ $no++ . '.' }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ Carbon::parse($user->created_at)->format('d-m-y, h:i:s A') }}</td>
                                        <td>{{ Carbon::parse($user->updated_at)->format('d-m-y, h:i:s A') }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col d-flex justify-content-center gap-2">
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDataAdmin{{ $user->id }}">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </button>
                                                    <form action="{{ route('user.admin.destroy', $user->id) }}"
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
                                @endif

                                {{-- Modal Edit Data --}}
                                <div class="modal fade" id="editDataAdmin{{ $user->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $user->id }}">
                                                    <strong>Edit Data : {{ $user->username }}</strong>
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.admin.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">
                                                                    Username
                                                                </label>
                                                                <input type="text" id="username" name="username"
                                                                    class="form-control" autofocus
                                                                    value="{{ old('username', $user->username) }}" required
                                                                    autofocus>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" id="email" name="email"
                                                                    class="form-control" required
                                                                    value="{{ old('email', $user->email) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Abaikan jika tidak mengubah password">
                                                                    Old Password
                                                                    <i class="align-middle" data-feather="info"></i>
                                                                </label>
                                                                <input type="password" id="password" name="password"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Abaikan jika tidak mengubah password">
                                                                    New Password <i class="align-middle"
                                                                        data-feather="info"></i>
                                                                </label>
                                                                <input type="password" id="password" name="password"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="role" class="form-label">
                                                                    Role
                                                                </label>
                                                                <input type="text" name="role" id="role"
                                                                    class="form-control" value="admin" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="pt-3">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
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

        {{-- Modal Tambah Data --}}
        <div class="modal fade" id="tambahDataAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            <strong>Tambah Data Admin</strong>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.admin.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">
                                            Username
                                        </label>
                                        <input type="text" id="username" name="username" class="form-control"
                                            autofocus value="{{ old('username') }}" required autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            required value="{{ old('email') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">
                                            Role
                                        </label>
                                        <input type="text" name="role" id="role" class="form-control"
                                            value="admin" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Tambah Data Ends --}}

    </main>
@endsection
