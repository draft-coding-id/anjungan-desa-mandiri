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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
      background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('assets/BackgroundMockupAnjungan.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .header {
      text-align: center;
      border-bottom: 2px solid #ffffff;
      padding: 20px 4px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
    }

    .header h2 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 28px;
      margin: 0;
      color: #333;
      text-shadow:
        2px 2px 0 white,
        -2px 2px 0 white,
        2px -2px 0 white,
        -2px -2px 0 white,
        3px 3px 0 white,
        -3px 3px 0 white,
        3px -3px 0 white,
        -3px -3px 0 white;
    }

    .page-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      border: 2px solid #ff9900;
      max-height: 70vh;
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #ff9900 #f0f0f0;
    }

    .container::-webkit-scrollbar {
      width: 8px;
    }

    .container::-webkit-scrollbar-track {
      background: #f0f0f0;
      border-radius: 4px;
    }

    .container::-webkit-scrollbar-thumb {
      background: #ff9900;
      border-radius: 4px;
    }

    .main-title {
      text-align: center;
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-bottom: 3px solid #ff9900;
      padding-bottom: 15px;
    }

    .section {
      margin-bottom: 40px;
      padding: 25px;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 15px;
      border-left: 5px solid #ff9900;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .section-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #ff9900;
      text-transform: uppercase;
      letter-spacing: 1px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title::before {
      content: "●";
      font-size: 20px;
      color: #ff9900;
    }

    .visi-content {
      font-size: 18px;
      line-height: 1.8;
      color: #333;
      text-align: center;
      padding: 20px;
      background: white;
      border-radius: 10px;
      border: 2px dashed #ff9900;
      font-weight: 500;
      font-style: italic;
    }

    .list-container {
      background: white;
      border-radius: 10px;
      padding: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    li {
      position: relative;
      padding: 12px 0 12px 30px;
      margin-bottom: 8px;
      font-size: 16px;
      line-height: 1.6;
      color: #444;
      border-bottom: 1px solid #eee;
      transition: all 0.3s ease;
    }

    li:hover {
      background: #fff8f0;
      padding-left: 35px;
    }

    li::before {
      content: "▶";
      position: absolute;
      left: 0;
      color: #ff9900;
      font-size: 12px;
      top: 15px;
    }

    li:last-child {
      border-bottom: none;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .stat-card {
      background: linear-gradient(135deg, #ff9900 0%, #e68a00 100%);
      color: white;
      padding: 20px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 6px 20px rgba(255, 153, 0, 0.3);
      transform: translateY(0);
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-number {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .stat-label {
      font-size: 14px;
      opacity: 0.9;
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

    .button-container-tentang-desa {
      display: flex;
      overflow-x: auto;
      align-items: center;
      justify-content: left;
      height: 100%;
      padding-top: 0px;
      gap: 80px;
      scrollbar-width: none;
    }

    .footer-button {
      display: flex;
      opacity: 60%;
      justify-content: center;
      align-items: center;
      background-color: #ff9900;
      color: white;
      text-align: center;
      padding: 20px 60px;
      border: 1px solid #ffffff;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
      flex-shrink: 0;
      font-size: 20px;
      line-height: 1.3;
      letter-spacing: 0.5px;
      height: 50px;
      max-width: 120px;
    }

    .footer-button.active {
      opacity: 100%;
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

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        width: 95%;
        padding: 20px;
        margin: 10px;
      }

      .main-title {
        font-size: 24px;
      }

      .section-title {
        font-size: 20px;
      }

      .section {
        padding: 15px;
      }

      .stats-grid {
        grid-template-columns: 1fr;
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