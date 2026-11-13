<!DOCTYPE html>
<html lang="en" class="@yield('html-class', '')">
<head>
    @include('index.layout.heads')
</head>
<body class="@yield('body-class', '')">

    @yield('preloader')

    <div class="page-wrapper">
        @include('index.layout.header')

        @yield('content')

        @include('index.layout.footer')
    </div>

    @include('index.layout.modals')

    @include('index.layout.script')

</body>
</html>

