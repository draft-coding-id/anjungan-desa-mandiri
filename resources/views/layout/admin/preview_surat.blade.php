<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Surat Resmi')</title>
  <style>
    /* Base Styles */
    body {
      background: #ffffff;
      font-family: 'Times New Roman', serif;
      margin: 0;
      padding: 15px;
      line-height: 1.6;
      font-size: 14px;
      color: #000;
    }

    /* Typography */
    h1 {
      font-size: 18px;
      font-weight: normal;
      margin: 0;
      line-height: 1.3;
    }

    h2 {
      font-size: 18px;
      font-weight: normal;
      text-decoration: underline;
      text-align: center;
    }

    p {
      line-height: 1;
      margin: 8px 0;
    }

    /* Layout Components */
    .document-header {
      text-align: center;
      margin-bottom: 5px;
    }

    .document-header table {
      width: 100%;
      border-collapse: collapse;
    }

    .document-header img {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }

    .document-header .title-section {
      text-align: center;
      vertical-align: middle;
      padding: 0 5px;
    }

    .document-header .title-section h1 {
      margin-bottom: 2px;
      font-weight: bold;
    }

    .document-header .title-section p {
      font-size: 12px;
      text-align: center;
      line-height: 1.4;
    }

    .document-header hr {
      border: none;
      border-top: 4px solid #000;
      margin: 10px 0;
    }

    .document-content {
      margin: 0 30px;
      text-align: justify;
    }

    .surat-header {
      text-align: center;
      margin-bottom: 10px;
    }

    .surat-header h2 {
      font-weight: bold;
      margin: 0;
    }

    .surat-header .nomor-surat {
      margin: 0;
      font-size: 13px;
      margin-bottom: 10px;
      text-align: center;
    }

    /* Data Table Styles */
    .data-table {
      width: 100%;
      margin: 15px 0;
      border-collapse: collapse;
    }

    .poto {
      text-align: center;
      padding: 40px 30px;
      border: 1px dashed #000;
    }

    .data-table td {
      padding: 4px 0;
      vertical-align: top;
      font-size: 14px;
    }

    .data-table td:first-child {
      width: 180px;
      font-weight: normal;
      padding-right: 10px;
    }

    .data-table td:nth-child(2) {
      width: 15px;
      text-align: center;
      padding: 0 5px;
    }

    .data-table td:nth-child(3) {
      width: auto;
      padding-left: 5px;
    }

    /* Special styles for kematian table */
    .data-table.kematian-table td:first-child {
      width: 200px;
      font-weight: bold;
    }

    .data-table.kematian-table td:nth-child(2) {
      padding-left: 60px;
    }

    /* Content Sections */
    .content-section {
      margin: 15px 0;
    }

    .section-title {
      font-weight: bold;
      margin: 20px 0 10px 0;
      font-size: 14px;
    }

    .indent {
      padding-left: 60px;
    }

    .camat {
      margin-top: 10px;
      text-align: center;
    }

    .camat p {
      line-height: 0.5;
    }

    .qr-code {
      width: 70px;
      height: 70px;
    }

    .footer-table {
      width: 100%;
    }

    .footer-table td {
      text-align: center;
    }

    .signature-right {
      width: 50%;
    }

    .signature-center {
      width: 0%;
    }

    .signature-left {
      width: 50%;
    }

    .foto {
      margin: 0 auto;
      width: 100px;
      height: 120px;
      border: 1px dashed #000;
      font-size: 12px;
    }

    .just-signature-right {
      text-align: right;
    }


    /* Print Optimization */
    .page-break {
      page-break-after: always;
    }

    .no-break {
      page-break-inside: avoid;
    }

    @media print {
      body {
        padding: 10px;
      }

      .document-content {
        margin: 0 20px;
      }

      .document-header img {
        width: 90px;
        height: 90px;
      }
    }
  </style>
</head>

<body>
  <!-- Document Header -->
  <div class="document-header">
    <table>
      <tr>
        <td width="20%">
          <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/logo.png'))) }}" alt="Logo Desa" />
        </td>
        <td width="60%" class="title-section">
          <h1>PEMERINTAH KABUPATEN BOGOR<br>KECAMATAN BOJONGGEDE<br>DESA RAWAPANJANG</h1>
          <p>Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos 16920</p>
        </td>
        <td width="20%"></td>
      </tr>
      <tr>
        <td colspan='3'>
          <hr>
        </td>
      </tr>
    </table>
  </div>

  <!-- Document Content -->
  <div class="document-content">
    <div class="surat-header">
      <h2>@yield('surat-title')</h2>
      <p class="nomor-surat">Nomor: {{ $surat->no_surat ?? '[Nomor Surat]' }}</p>
    </div>

    <div class="content-section">
      @yield('content')
      <!-- Document Footer -->
      @yield('footer')
    </div>
  </div>



  <!-- Page Break -->
  @if(isset($pageBreak) && $pageBreak)
  <div class="page-break"></div>
  @endif
</body>

</html>