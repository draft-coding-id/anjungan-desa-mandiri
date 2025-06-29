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
        .sidebar-header img {
            margin-bottom: 300px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg> -->
            <img src="assets/logo.png" height="100px">
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