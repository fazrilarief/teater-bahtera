<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.auth.head')
</head>

<body>
    @include('sweetalert::alert')
    <main class="d-flex w-100">
        @yield('content')
    </main>
    @include('includes.auth.script')
</body>

</html>
