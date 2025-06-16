<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anjungan Desa Mandiri Desa Rawapanjang</title>
    <link rel="icon" href="assets/logo.png" type="image/png">

    <style>
        body {
            /* background: linear-gradient(to top, #ff9472, #f2709c); */
            margin: 0;
            font-family: sans-serif;
            overflow-x: hidden;
            /* height: 100vh; Mengatur tinggi body agar menutupi seluruh viewport */
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .header {
            /* color: white; */
            text-align: center;
        }

        .video-container {
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #000000;
            /* color: white; */
            width: 100%;
        }

        .button-container {
            display: flex;
            overflow-x: auto;
            justify-content: center;
            align-items: center;
            padding: 20px;
            padding-top: 0px;
            gap: 20px;
            scrollbar-width: none;
            /* Sembunyikan scrollbar di Edge, Chrome */
        }

        .button {
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
            height: 50px;
            max-width: 120px;
        }

        .button:hover {
            background-color: #e68a00;
        }

        .footer {
            /* position: fixed;
            bottom: 0; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 150px;
            color: white;
            text-align: center;
            background-color: rgba(255, 153, 0, 0.5);
            border: 2px solid rgba(0, 0, 0, 0.0);
            padding-bottom: 30px;
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

        /* .colors {
            color: #888;
            color: #555;
            color: #4caf50;
            background: #388e3c;
            color: #333;
            color: #fff;
        } */
    </style>
</head>

<body>
    <div class="header">
        <h3>Selamat Datang di Anjungan Desa Mandiri</h3>
        <h3>Desa Rawapanjang Kabupaten Bogor</h3>
    </div>
    <div class="video-container">
        <!-- <p>Video Profil Desa</p> -->
        <!-- <video controls> <source src="video-profil-desa.mp4" type="video/mp4"> Replace with your video source Your browser does not support the video tag. </video>  -->
    </div>
    <div class="footer">
        <p>Silahkan pilih menu yang Anda perlukan hari ini.</p>
        <div class="button-container">
            <!-- <button class="button" onclick="window.location.href='/layanan_digital';">Layanan Digital</button> -->
            <a href='/warga' class="button">Warga</a>
            <a href='/admin' class="button">Admin</a>
        </div>
        <div class="credit">
            <p>&copy;</p>
        </div>
    </div>
</body>

</html>