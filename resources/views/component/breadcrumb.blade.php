@extends('layouts.admin.app')

@section('content')
    {{-- Breadrcumb --}}
    <nav class="c-navigation-breadcrumbs">
        <ol class="c-navigation-breadcrumbs__directory">

            <li class="c-navigation-breadcrumbs__item">
                <a class="c-navigation-breadcrumbs__link" href="#">
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
@endsection
