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
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
    }

    main {
      min-height: 100vh;
      width: 100vw;
      background-image: url('{{asset('assets/BackgroundMockupAnjungan.png')}}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
    }

    .container {
      display: flex;
      min-height: 100vh;
    }

    /* Kolom Kiri - Info Desa */
    .left-col {
      background-color: rgba(217, 217, 217, 0.9);
      backdrop-filter: blur(5px);
      width: 30vw;
      min-width: 300px;
      height: 100vh;
      display: flex;
      gap: 15px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
      position: sticky;
      top: 0;
    }

    .left-col h1 {
      font-size: clamp(28px, 4vw, 40px);
      text-align: center;
      line-height: 1.2;
      margin: 5px 0;
      font-weight: 700;
      color: #333;
    }

    .left-col img {
      width: clamp(120px, 15vw, 200px);
      height: clamp(120px, 15vw, 200px);
      object-fit: contain;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Kolom Kanan - Layanan Digital */
    .right-col {
      flex: 1;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      overflow-y: auto;
      position: relative;
    }

    .content-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
      width: 100%;
      max-width: 1200px;
    }

    /* Header Layanan */
    .header-wrapper {
      text-align: center;
      margin-bottom: 30px;
      width: 100%;
    }

    .header h1 {
      font-size: clamp(28px, 5vw, 36px);
      margin-bottom: 15px;
      color: #333;
      font-weight: 700;
    }

    .header p {
      font-size: clamp(16px, 2.5vw, 20px);
      font-weight: 600;
      color: #555;
      margin-bottom: 20px;
    }

    /* Color Classes */
    .green {
      padding: 16px 60px;
      background: linear-gradient(135deg, #02BE2B, #28a745);
      color: white;
      border-radius: 40px;
      display: inline-block;
      box-shadow: 0 4px 15px rgba(2, 190, 43, 0.3);
    }

    .skyblue {
      padding: 16px 60px;
      background: linear-gradient(135deg, #02BEBE, #17a2b8);
      color: white;
      border-radius: 40px;
      box-shadow: 0 4px 15px rgba(2, 190, 190, 0.3);
    }

    .indigo {
      padding: 16px 60px;
      background: linear-gradient(135deg, #7602BE, #8b5cf6);
      color: white;
      border-radius: 40px;
      box-shadow: 0 4px 15px rgba(118, 2, 190, 0.3);
    }

    .coffee {
      padding: 16px 60px;
      background: linear-gradient(135deg, #B2A91C, #d4b023);
      color: white;
      border-radius: 40px;
      box-shadow: 0 4px 15px rgba(178, 169, 28, 0.3);
    }

    /* Button Styles */
    .button-green,
    .button-skyblue,
    .button-indigo,
    .button-coffee {
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      border-radius: 20px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      font-size: clamp(16px, 2.5vw, 20px);
      text-align: center;
      line-height: 1.3;
      padding: 50px 0px;
      min-height: 120px;
      width: 100%;
      max-width: 200px;
      transition: all 0.3s ease;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      border: none;
    }

    .button-green {
      background: linear-gradient(135deg, #02BE2B, #28a745);
    }

    .button-green:hover {
      background: linear-gradient(135deg, #28a745, #02BE2B);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(2, 190, 43, 0.3);
    }

    .button-skyblue {
      background: linear-gradient(135deg, #02BEBE, #17a2b8);
    }

    .button-skyblue:hover {
      background: linear-gradient(135deg, #17a2b8, #02BEBE);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(2, 190, 190, 0.3);
    }

    .button-indigo {
      background: linear-gradient(135deg, #7602BE, #8b5cf6);
    }

    .button-indigo:hover {
      background: linear-gradient(135deg, #8b5cf6, #7602BE);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(118, 2, 190, 0.3);
    }

    .button-coffee {
      background: linear-gradient(135deg, #B2A91C, #d4b023);
    }

    .button-coffee:hover {
      background: linear-gradient(135deg, #d4b023, #B2A91C);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(178, 169, 28, 0.3);
    }

    /* Header Button - Histori */
    .header-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      z-index: 100;
    }

    .header-btn a {
      text-decoration: none;
      color: white;
      font-weight: 600;
      font-size: clamp(22px, 1.8vw, 26px);
      padding: 20px 40px;
      background: linear-gradient(135deg, #ff9900, #ff8c00);
      padding: 10px 26px;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(255, 153, 0, 0.3);
      white-space: nowrap;
    }

    .header-btn a:hover {
      background: linear-gradient(135deg, #ff8c00, #ff9900);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(255, 153, 0, 0.4);
    }

    /* Container Surat */
    .surat-container {
      display: grid;
      font-size: 30px;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 20px;
      justify-content: center;
      margin-bottom: 40px;
      width: 100%;
      max-width: 1000px;
      padding: 0 20px;
    }

    /* Container Navigasi */
    .nav-container {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
      width: 100%;
      max-width: 800px;
      padding: 20px;
      border-radius: 20px;
      margin-top: auto;
    }

    /* Tombol Navigasi */
    .button {
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #ff9900, #ff8c00);
      color: white;
      padding: 20px 40px;
      border-radius: 25px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      font-size: clamp(20px, 2vw, 24px);
      text-align: center;
      min-height: 45px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(255, 153, 0, 0.3);
      white-space: nowrap;
    }

    .button:hover {
      background: linear-gradient(135deg, #ff8c00, #ff9900);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(255, 153, 0, 0.4);
    }

    /* Tablet Responsive */
    @media (max-width: 1024px) {
      .left-col {
        width: 35vw;
        min-width: 250px;
      }

      .surat-container {
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 15px;
      }

      .button-green,
      .button-skyblue,
      .button-indigo,
      .button-coffee {
        max-width: 150px;
        min-height: 90px;
        font-size: clamp(12px, 1.8vw, 16px);
      }
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }

      .left-col {
        width: 100vw;
        height: auto;
        min-height: 30vh;
        position: static;
        padding: 20px;
      }

      .left-col h1 {
        font-size: clamp(20px, 5vw, 28px);
        margin: 3px 0;
      }

      .left-col img {
        width: clamp(80px, 20vw, 120px);
        height: clamp(80px, 20vw, 120px);
      }

      .right-col {
        width: 100vw;
        min-height: 70vh;
        padding: 15px;
      }

      .header-btn {
        position: static;
        justify-content: center;
        margin-bottom: 20px;
        width: 100%;
      }

      .header-btn a {
        font-size: clamp(14px, 4vw, 16px);

        padding: 8px 16px;
      }

      .surat-container {
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 12px;
        padding: 10px 20px;
      }

      .button-green,
      .button-skyblue,
      .button-indigo,
      .button-coffee {
        max-width: none;
        min-height: 90px;
        font-size: clamp(14px, 4vw, 16px);
        padding: 20px 10px;
      }

      .nav-container {
        margin-top: 20px;
        gap: 10px;
        padding: 15px;
      }

      .button {
        padding: 10px 20px;
        font-size: clamp(12px, 3vw, 14px);
        min-height: 40px;
      }

      .header h1 {
        font-size: clamp(20px, 5vw, 28px);
      }

      .header p {
        font-size: clamp(14px, 3.5vw, 18px);
      }

      .green,
      .skyblue,
      .indigo,
      .coffee {
        padding: 12px 40px;
        font-size: clamp(16px, 4vw, 20px);
      }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
      .surat-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
      }

      .button-green,
      .button-skyblue,
      .button-indigo,
      .button-coffee {
        min-height: 90px;
        font-size: 18px;
      }

      .nav-container {
        flex-direction: column;
        gap: 8px;
      }

      .button {
        width: 100%;
        padding: 12px;
      }

      .header-btn {
        flex-direction: column;
        gap: 8px;
      }

      .header-btn a {
        width: 100%;
        text-align: center;
      }
    }

    /* Large Desktop */
    @media (min-width: 1400px) {
      .surat-container {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
      }

      .button-green,
      .button-skyblue,
      .button-indigo,
      .button-coffee {
        max-width: 300px;
        max-height: 150px;
        font-size: 26px;
      }
    }
  </style>
</head>

<body>
  <main>
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
          <a target="_blank" href="http://wa.me/+6287788840513">Ganti PIN</a>
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

        <!-- Container Navigasi -->
        <div class="nav-container">
          @yield('nav-button')
        </div>
      </div>
    </div>
  </main>
</body>

</html>