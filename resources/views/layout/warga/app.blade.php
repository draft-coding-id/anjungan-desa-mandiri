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
            font-family: sans-serif;
            overflow-x: hidden;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Mengatur tinggi body agar menutupi seluruh viewport */
        }

        .form-container {
            width: 70%;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            margin-top: 50px;
            border: 3px solid #000000;
            border-radius: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 70%;
            padding: 80px;
            border-radius: 10px;
        }

        ul {
            line-height: 1.75;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
            color: black;
        }

        .form-group {
            margin: 20px;
        }

        .form-group label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
            margin-bottom: 10px
        }

        .form-group input {
            width: calc(90%);
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 20px;
        }

        .form-group input[type="number"] {
            width: 50px;
            margin-left: -120px;
        }


        .header {
            text-align: center;
            /* height: 15%; */
            border-bottom: 2px solid #ffffff;
            padding: 4px;
        }

        .header h2 {
            /* box-shadow: 0 0 0 4px white; */
            font-family: Arial, Helvetica, sans-serif;
            text-shadow:
                1px 1px 0 white,
                -1px 1px 0 white,
                1px -1px 0 white,
                -1px -1px 0 white,
                2px 2px 0 white,
                -2px 2px 0 white,
                2px -2px 0 white,
                -2px -2px 0 white;
        }

        .page-content {
            display: flex;
            height: 80%;
            align-items: center;
            justify-content: center;
        }

        .video-container {
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #ffffff;
            /* color: white; */
            width: 100%;
        }

        .button-container {
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            gap: 20px;
            padding: 20px;
            padding-top: 0px;
            max-width: 90%;         /* Batasi lebar container */
            margin: 0 auto;         /* Tengah secara horizontal */
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .button-container::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera: hilangkan tampilan scrollbar */
        }

        .scroll-hint {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            animation: bounceLeft 1.2s infinite;
            font-size: 24px;
            color: white;
            z-index: 2;
            pointer-events: none;
        }

        @keyframes bounceLeft {
            0%, 100% { transform: translateY(-50%) translateX(0); opacity: 0.7; }
            50% { transform: translateY(-50%) translateX(-6px); opacity: 1; }
        }



        .button {
            flex: 0 0 auto;             /* Jangan izinkan tombol mengecil atau membesar */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 10px 30px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            line-height: 1.3;
            letter-spacing: 0.5px;
            height: 50px;
            max-width: 120px;
        }

        .button:hover {
            background-color: #e68a00;
        }

        .agenda-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            align-items: flex-end;
            height: 100%;
            padding: 20px;
            padding-top: 0px;
            gap: 30px;
            scrollbar-width: none;
        }

        .agenda-container .button {
            background-color: transparent;
            text-align: center;
            border: #e68a00 1px solid;
            color: #ffffff;
        }

        .agenda-container .button.active {
            background-color: #ff9900;
            color: white;
        }

        .footer-tentang-desa {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: 200px;
            color: white;
            text-align: center;
        }

        .footer-button {
            display: flex;
            opacity: 60%;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 10px 30px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 16px;
            line-height: 1.3;
            letter-spacing: 0.5px;
            height: 50px;
            max-width: 120px;
        }

        .footer-button.active {
            opacity: 100%;
        }

        .button-container-tentang-desa {
            display: flex;
            overflow-x: auto;
            align-items: end;
            justify-content: space-between;
            height: 100%;
            padding-top: 0px;
            gap: 20px;
            scrollbar-width: none;
            /* Sembunyikan scrollbar di Edge, Chrome */
        }

        .back-button {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 10px 30px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 16px;
            line-height: 1.3;
            letter-spacing: 0.5px;
            height: 120px;
            max-width: 180px;
            width: 100%;
        }

        .button-container-tentang-desa button:active {
            background-color: #e68a00;
        }

        .footer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: 150px;
            color: white;
            text-align: center;
            border: 2px solid rgba(0, 0, 0, 0.0);
            padding-bottom: 30px;
        }

        .footer h3 {
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
            text-shadow: 1px 1px 0 white,
                -1px 1px 0 white,
                1px -1px 0 white,
                -1px -1px 0 white,
                2px 2px 0 white,
                -2px 2px 0 white,
                2px -2px 0 white,
                -2px -2px 0 white;
        }

        .credit {
            position: fixed;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30px;
            width: 100%;
            font-size: 12px;
            background-color: #ff9900;
            color: white;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>
            @yield('header')
        </h2>
    </div>
    {{-- <div class="video-container">
        <p>Video Profil Desa</p>
        <!-- <video controls> <source src="video-profil-desa.mp4" type="video/mp4"> Replace with your video source Your browser does not support the video tag. </video>  -->
    </div> --}}
    <div class="page-content">
        @yield('content')
    </div>
    @yield('form-container')
    @yield('back-button')
    @yield('footer')
</body>

</html>