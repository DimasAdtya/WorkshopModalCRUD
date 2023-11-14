<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
</head>
<body>
    <div class="main-wrapper">
        <div class="px-3 py-2 text-bg-dark">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <h3> Data Siswa </h3>
                </div>
            </div>
        </div>
        {{-- Batas Body --}}

        <div class="main-content">
            @yield('content')
        </div>
        
        {{-- Batas Body --}}
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">©2023 RPL, d0dh7707</p>
            </footer>
        </div>
    </div>
</body>
</html>