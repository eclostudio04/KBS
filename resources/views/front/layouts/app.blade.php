<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('before-styles')
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    {{-- tailwind css --}}
    @vite('resources/css/app.css')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/flickity.min.css') }}" media="screen">
    @stack('after-styles')

    <title> @yield('title')</title>
</head>

<body class="font-poppins text-[#292E4B] bg-[#F6F9FC]">

    {{-- navbar --}}
    {{-- <navbar>
        @include('front.component.navbar')
    </navbar> --}}


    {{-- isi konten yang berbeda beda sesuai dengan halaman --}}
    @yield('content')

    {{-- footer --}}
    @include('front.component.footer')


    <!-- JavaScript -->

    @stack('before-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/flickity.pkgd.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    @stack('after-scripts')
</body>

</html>
