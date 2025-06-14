<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">
    {{--
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            overflow-x: hidden;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow-y: auto;
            height: 100vh;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 100px;
            align-items: center;
            /* height: 100vh; */
        }

        h1 {
            text-align: center;
            font-size: 24px;
        }

        h3 {
            text-align: center;
            font-size: 18px;
            color: #000;
        }

        .header {
            text-align: center;
        }

        .header p {
            font-size: 20px;
            font-weight: bold color: #000;
        }

        .button-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            /* align-items: center; */
            padding: 20px;
            padding-top: 0px;
            gap: 80px;
            scrollbar-width: none;
        }

        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 8px 30px;
            border-radius: 24px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            height: 50px;
            max-width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button:hover {
            background-color: #e68a00;
        }

        .green {
            padding: 16px 180px;
            background-color: #02BE2B;
            color: white;
            border-radius: 40px;

        }

        .button-green {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #02BE2B;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-green:hover {
            background-color: #0ae539;
        }

        .skyblue {
            padding: 16px 180px;
            background-color: #02BEBE;
            color: white;
            border-radius: 40px;

        }

        .button-skyblue {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #02BEBE;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-skyblue:hover {
            background-color: #06dede;
        }

        .indigo {
            padding: 16px 180px;
            background-color: #7602BE;
            color: white;
            border-radius: 40px;
        }

        .button-indigo {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7602BE;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-indigo:hover {
            background-color: #8b08dd;
        }

        .coffee {
            padding: 16px 180px;
            background-color: #B2A91C;
            color: white;
            border-radius: 40px;
        }

        .button-coffee {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #B2A91C;
            color: white;
            padding: 20px 30px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            line-height: 1.4em;
            padding: 20px;
            height: 100px;
            width: 200px;
            box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
        }

        .button-coffee:hover {
            background-color: #c4b71f;
        }

    </style>
</head>

<body>
    <main>
        <div class="header">
            <h1>Layanan Digital</h1>
            @yield('header-button')
            <p>Silahkan pilih surat yang ingin Anda ajukan</p>
        </div>
        <div class="button-container">
            @yield('surat-button')
        </div>
        <div class="button-container">
            @yield('nav-button')
        </div>
    </main>
</body>

</html>
