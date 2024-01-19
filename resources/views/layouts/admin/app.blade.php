<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <div class="wrapper">
        @include('sweetalert::alert')1
        @include('includes.sidebar')
        <div class="main">
            @include('includes.navbar')
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
    @include('includes.script')
</body>

</html>
