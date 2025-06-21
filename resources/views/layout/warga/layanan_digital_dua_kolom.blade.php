<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">

  <style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      overflow: hidden;
    }

    main {
      min-height: 100vh;
      width: 100vw;
      background-image: url('{{asset('assets/BackgroundMockupAnjungan.png')}}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    /* Kolom Kiri - Info Desa */
    .left-col {
      background-color: #D9D9D9BF;
      width: 30vw;
      height: 100%;
      display: flex;
      gap: 10px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .left-col h1 {
      font-size: 36px;
      text-align: center;
      line-height: 20px;
      margin: 5px 0;
    }

    .left-col img {
      width: 200px;
      height: 200px;
    }

    /* Kolom Kanan - Layanan Digital */
    .right-col {
      width: 70vw;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      overflow-y: auto;
    }

    .content-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
    }

    /* Header Layanan */
    .header-wrapper {
      text-align: center;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .header p {
      font-size: 18px;
      font-weight: bold;
      color: #000;
      margin-bottom: 20px;
    }

    .green {
      padding: 16px 60px;
      background-color: #02BE2B;
      color: white;
      border-radius: 40px;
      display: inline-block;
    }

    .skyblue {
      padding: 16px 100px;
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
      padding: 16px 100px;
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
      padding: 16px 100px;
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

    /* Header Button - Histori */
    .header-btn {
      position: absolute;
      right: 5%;
      display: flex;
      justify-content: center;
      align-items: center;
      gap : 10px;
      text-decoration: none;
      font-weight: bold;
      top: 10%;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      font-size: 14px;
    }

    .header-btn a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      font-size: 14px;
      background-color: #ff9900;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
    }

    .header-btn a :hover {
      background-color: #e68a00;
    }

    /* Container Surat */
    .surat-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin-bottom: 40px;
      max-width: 100%;
    }

    /* Tombol Surat */
    .button-green {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #02BE2B;
      color: white;
      padding: 20px;
      border-radius: 30px;
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
      font-size: 18px;
      text-align: center;
      line-height: 1.4em;
      height: 80px;
      width: 160px;
      box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
    }

    .button-green:hover {
      background-color: #0ae539;
    }

    /* Container Navigasi */
    .nav-container {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      width: calc(50vw - 40px);
    }

    /* Tombol Navigasi */
    .button {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ff9900;
      color: white;
      padding: 10px 20px;
      border-radius: 24px;
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
      text-align: center;
      height: 40px;
      min-width: 100px;
      box-shadow: 8px 8px 12px rgba(255, 255, 255, 0.5);
    }

    .button:hover {
      background-color: #e68a00;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .left-col,
      .right-col {
        width: 100vw;
        height: 50vh;
      }

      .left-col h1 {
        font-size: 24px;
      }

      .left-col img {
        width: 120px;
        height: 120px;
      }

      .header-btn {
        position: relative;
        right: auto;
        top: auto;
        margin-top: 10px;
      }

      .nav-container {
        position: relative;
        bottom: auto;
        left: auto;
        transform: none;
        width: 100%;
        margin-top: 20px;
      }
    }
  </style>
</head>

<body>
  <main>
    <!-- Tombol Histori & Progres Surat (Position Absolute) -->

    <div class="container">
      <!-- Kolom Kiri - Info Desa -->
      <div class="left-col">
        <img src="{{asset('assets/logo.png')}}" alt="Logo Desa Rawapanjang" />
        <h1>Anjungan Desa Mandiri</h1>
        <h1>Desa Rawapanjang</h1>
        <h1>Kabupaten Bogor</h1>
      </div>

      <!-- Kolom Kanan - Layanan Digital -->
      <div class="right-col">
        <div class="header-btn">
          <a href="/histori-progres-surat">Histori & Progres Surat</a>
          <a href="#">Ganti PIN</a>
        </div>


        <div class="content-wrapper">
          <!-- Header -->
          <div class="header-wrapper">
            <div class="header">
              <h1>Layanan Digital</h1>
              @yield('header-button')
              <p>Silahkan pilih surat yang ingin Anda ajukan</p>
            </div>
          </div>

          <!-- Container Surat -->
          <div class="surat-container">
            @yield('surat-button')
          </div>
        </div>

        <!-- Container Navigasi (Fixed di Bawah) -->
        <div class="nav-container">
          @yield('nav-button')
        </div>
      </div>
    </div>
  </main>
</body>

</html>