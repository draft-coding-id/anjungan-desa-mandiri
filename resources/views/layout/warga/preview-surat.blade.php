<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="icon" href="assets/logo.png" type="image/png">
  <style>
    body {
      background: #ffffff;
      font-family: 'Times New Roman', serif;
      margin: 0;
      padding: 0;
    }

    h1,
    h2 {
      font-size: 24px;
      font-weight: normal;
    }

    p {
      line-height: 1.5;
    }

    .header {
      text-align: center;
    }

    .content {
      margin: 20px 50px;
      text-align: justify;
    }

    .footer {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .footer div {
      text-align: center;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 10px;
      border-bottom: 2px solid #000;
      padding-bottom: 5px;
    }

    .content table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .content td {
      padding: 8px;
      vertical-align: top;
    }

    .content td:first-child {
      width: 200px;
    }

    .content td:nth-child(2) {
      width: 10px;
    }

    .content td:last-child {
      padding-left: 10px;
    }

    hr {
      border: 1px solid #000;
      margin-top: 30px;
    }

    .footer p {
      margin: 0;
      padding: 0;
    }

    .footer .signature {
      margin-top: 40px;
    }

    .footer .photo {
      width: 80px;
      height: 100px;
      border: 1px dashed #000;
      overflow: hidden;
      display : flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="header">
    <table width="100%">
      <tr>
        <td>
          <img src="{{ asset('assets/logo.png') }}" height="116px" width="116px" alt="Logo Desa" />
        </td>
        <td width="100%">
          <h1>PEMERINTAH KABUPATEN BOGOR</h1>
          <h1>KECAMATAN BOJONGGEDE</h1>
          <h1>DESA RAWAPANJANG</h1>
          <p>Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos 16920</p>
        </td>
      </tr>
    </table>
    <hr>
  </div>

  <div class="content">
    <div class="header">
      <h2>@yield('surat-title')</h2>
      <p>Nomor: [nomor_surat]</p>
    </div>

    <div>
      @yield('surat-content')
    </div>
  </div>
</body>

</html>