<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Form Container - Responsive */
        .form-container {
            width: min(90%, 800px);
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: clamp(20px, 4vw, 40px);
            margin: 20px auto;
            border: 3px solid rgba(0, 0, 0, 0.3);
            border-radius: clamp(20px, 5vw, 60px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .container {
            width: min(90%, 1000px);
            padding: clamp(20px, 5vw, 80px);
            margin: 0 auto;
            border-radius: 10px;
        }

        ul {
            line-height: 1.75;
            padding-left: 20px;
        }

        h1 {
            text-align: center;
            font-size: clamp(20px, 4vw, 28px);
            margin-bottom: 15px;
            color: #333;
        }

        h3 {
            text-align: center;
            margin-bottom: 25px;
            font-size: clamp(16px, 3vw, 20px);
            color: #444;
        }

        .form-group {
            margin: clamp(15px, 3vw, 25px) 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            font-size: clamp(14px, 2.5vw, 16px);
        }

        .form-group input {
            width: 100%;
            padding: clamp(8px, 2vw, 12px);
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: clamp(14px, 2.5vw, 16px);
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #ff9900;
            box-shadow: 0 0 0 3px rgba(255, 153, 0, 0.1);
        }

        .form-group input[type="number"] {
            width: min(100px, 30%);
        }

        /* Header - Fully Responsive */
        .header {
            text-align: center;
            padding: clamp(15px, 3vw, 25px);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 20px;
        }

        .header h2 {
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: clamp(16px, 4vw, 28px);
            font-weight: 700;
            color: #333;
            text-shadow:
                2px 2px 0 white,
                -1px 1px 0 white,
                1px -1px 0 white,
                -1px -1px 0 white,
                3px 3px 6px rgba(0, 0, 0, 0.2);
            line-height: 1.3;
            max-width: 95%;
            margin: 0 auto;
        }

        /* Page Content - Responsive Video Container */
        .page-content {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
            padding: clamp(15px, 3vw, 30px);
            min-height: 60vh;
        }

        /* Responsive Video Container */
        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            border: 3px solid rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: rgba(0, 0, 0, 0.1);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
        }

        /* Fallback for non-iframe content */
        .video-container p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: clamp(16px, 3vw, 24px);
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        /* Button Container - Horizontal Scroll */
        .button-container {
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            gap: clamp(10px, 2vw, 20px);
            padding: clamp(15px, 3vw, 25px);
            max-width: 95%;
            margin: 0 auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 153, 0, 0.5) transparent;
            position: relative;
        }

        .button-container::-webkit-scrollbar {
            height: 6px;
        }

        .button-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .button-container::-webkit-scrollbar-thumb {
            background: rgba(255, 153, 0, 0.6);
            border-radius: 3px;
        }

        .button-container::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 153, 0, 0.8);
        }

        .scroll-hint {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            animation: bounceLeft 1.5s infinite;
            font-size: clamp(18px, 3vw, 24px);
            color: rgba(255, 255, 255, 0.8);
            z-index: 2;
            pointer-events: none;
        }

        @keyframes bounceLeft {

            0%,
            100% {
                transform: translateY(-50%) translateX(0);
                opacity: 0.6;
            }

            50% {
                transform: translateY(-50%) translateX(-8px);
                opacity: 1;
            }
        }

        /* Responsive Buttons */
        .button {
            flex: 0 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: 10px 100px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: clamp(12px, 2.5vw, 16px);
            line-height: 1.3;
            letter-spacing: 0.5px;
            min-height: clamp(40px, 8vw, 50px);
            max-width: clamp(100px, 20vw, 140px);
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 153, 0, 0.3);
        }

        .button:hover {
            background: linear-gradient(135deg, #ff8c00, #ff9900);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 153, 0, 0.4);
        }

        /* Agenda Container */
        .agenda-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            align-items: flex-end;
            padding: clamp(15px, 3vw, 25px);
            gap: clamp(15px, 3vw, 30px);
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 153, 0, 0.5) transparent;
        }

        .agenda-container .button {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 2px solid #ff9900;
            color: white;
        }

        .agenda-container .button.active {
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
        }

        /* Footer Section */
        .footer-tentang-desa {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: clamp(150px, 25vh, 200px);
            color: white;
            text-align: center;
            padding: clamp(20px, 4vw, 40px);
        }

        .footer-button {
            display: flex;
            opacity: 0.7;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: clamp(8px, 2vw, 12px) clamp(20px, 4vw, 35px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: clamp(12px, 2.5vw, 16px);
            line-height: 1.3;
            letter-spacing: 0.5px;
            min-height: clamp(40px, 8vw, 50px);
            max-width: clamp(100px, 20vw, 140px);
            transition: all 0.3s ease;
        }

        .footer-button.active {
            opacity: 1;
            box-shadow: 0 4px 15px rgba(255, 153, 0, 0.4);
        }

        .button-container-tentang-desa {
            display: flex;
            overflow-x: auto;
            align-items: end;
            justify-content: space-between;
            padding: clamp(15px, 3vw, 25px) 0;
            gap: clamp(15px, 3vw, 25px);
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 153, 0, 0.5) transparent;
        }

        .back-button {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            padding: clamp(15px, 3vw, 25px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: clamp(14px, 3vw, 18px);
            line-height: 1.3;
            letter-spacing: 0.5px;
            min-height: clamp(80px, 15vw, 120px);
            max-width: clamp(140px, 25vw, 200px);
            width: 100%;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(255, 153, 0, 0.3);
        }

        .back-button:hover {
            background: linear-gradient(135deg, #ff8c00, #ff9900);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 153, 0, 0.4);
        }

        .footer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: clamp(120px, 20vh, 150px);
            color: white;
            text-align: center;
            padding: clamp(20px, 4vw, 40px) clamp(15px, 3vw, 30px);
        }

        .footer h3 {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin-bottom: clamp(15px, 3vw, 25px);
            font-size: clamp(16px, 3vw, 20px);
            text-shadow:
                2px 2px 0 rgba(255, 255, 255, 0.8),
                -1px 1px 0 rgba(255, 255, 255, 0.8),
                1px -1px 0 rgba(255, 255, 255, 0.8),
                -1px -1px 0 rgba(255, 255, 255, 0.8),
                3px 3px 6px rgba(0, 0, 0, 0.3);
        }

        .credit {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: clamp(25px, 5vw, 35px);
            font-size: clamp(10px, 2vw, 12px);
            background: linear-gradient(135deg, #ff9900, #ff8c00);
            color: white;
            z-index: 1000;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Mobile Specific Adjustments */
        @media (max-width: 768px) {
            body {
                background-attachment: scroll;
            }

            .header h2 {
                font-size: clamp(14px, 5vw, 22px);
                line-height: 1.4;
            }

            .page-content {
                padding: 15px;
                min-height: 50vh;
            }

            .video-container {
                border-width: 2px;
                border-radius: 10px;
            }

            .button-container {
                gap: 12px;
                padding: 15px 10px;
            }

            .button {
                min-width: 90px;
                font-size: 12px;
                padding: 10px 15px;
            }

            .agenda-container {
                gap: 15px;
                padding: 15px 10px;
            }

            .footer {
                padding-bottom: 50px;
                /* Space for credit bar */
            }
        }

        /* Small Mobile */
        @media (max-width: 480px) {
            .header {
                padding: 10px 5px;
            }

            .header h2 {
                font-size: clamp(12px, 6vw, 18px);
            }

            .page-content {
                padding: 10px;
            }

            .button-container {
                padding: 10px 5px;
                gap: 8px;
            }

            .button {
                min-width: 80px;
                font-size: 11px;
                padding: 8px 12px;
                min-height: 35px;
            }

            .back-button {
                font-size: 12px;
                min-height: 70px;
                max-width: 120px;
            }
        }

        /* Large Desktop */
        @media (min-width: 1400px) {
            .video-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .button {
                max-width: 160px;
                font-size: 18px;
            }
        }

        /* Landscape Mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .header {
                padding: 8px;
            }

            .header h2 {
                font-size: 16px;
            }

            .page-content {
                min-height: 40vh;
                padding: 10px;
            }

            .footer {
                min-height: 80px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>
            @yield('header')
        </h2>
    </div>

    <div class="page-content">
        <!-- Example responsive video implementation -->
        <div class="video-wrapper">
            <div class="video-container">
                <iframe
                    src="https://www.youtube.com/embed/5Ds6RMBPjKg?autoplay=1&mute=1&loop=1&playlist=5Ds6RMBPjKg"
                    title="Video Profil Desa Rawapanjang"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        @yield('content')
    </div>

    @yield('form-container')
    @yield('back-button')
    @yield('footer')

    <div class="credit">
        <p>&copy; 2025 Trisna Wahyu Mukti, Raihan Darmawan Pringgodigdo, Fakultas Ilmu Komputer
            Universitas Pembangunan Nasional "Veteran" Jakarta</p>
    </div>
</body>

</html>