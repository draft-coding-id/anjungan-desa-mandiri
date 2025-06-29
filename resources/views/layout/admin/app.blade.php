<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="icon" href="assets/logo.png" type="image/png">
    <style>
        @yield('additional-styles');
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="assets/logo.png" width="80" height="80" />
            <h3>{{auth()->user()->name}}</h3>
            <p>Desa Rawapanjang <br> Kabupaten Bogor</p>
        </div>
        @include('layout.admin.sidebar')
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h3>Desa Rawapanjang, Kabupaten Bogor</h3>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>