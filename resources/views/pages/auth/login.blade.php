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
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter your Username" required autofocus />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter your password" required />
                                    </div>
                                    <div>
                                        <div class="form-check align-items-center">
                                            <input id="customControlInline" type="checkbox" class="form-check-input"
                                                value="remember-me" name="remember-me">
                                            <label class="form-check-label text-small" for="customControlInline">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <a href="index.html" class="btn btn-lg btn-primary">Sign in</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="text-center mb-3">
                        Don't have an account? <a href="pages-sign-up.html">Sign up</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
