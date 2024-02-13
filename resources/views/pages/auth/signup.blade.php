@extends('layouts.auth.app')

@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <img src="{{ asset('assets/img/logos/logo-teater-circle.png') }}" alt="Logo Teater"
                            style="height: 100px">
                        <p class="lead">
                            Creat your own account
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Full name</label>
                                        <input class="form-control form-control-lg" type="text" name="name"
                                            placeholder="Enter your name" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter password" />
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <a href="index.html" class="btn btn-lg btn-primary">Sign up</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="text-center mb-3">
                        Already have account? <a href="pages-sign-in.html">Log In</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
