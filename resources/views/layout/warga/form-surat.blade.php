<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="assets/logo.png" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
</head>

<body>
    <div class="header">
        <h2>@yield('header-content')</h2>
        <h3>Silahkan isi data anda</h3>
    </div>

    <div class="form-container">
        <div class="form-wrapper">
            @if(session('error'))
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <strong>Error:</strong> {{ session('error') }}
            </div>
            @endif
            @yield('form-content')
        </div>
    </div>
</body>

</html>