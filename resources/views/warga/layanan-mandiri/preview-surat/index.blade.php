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

    .category-section {
      margin-bottom: 20px;
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
      <h2>{{$proses_surat['nama_jenis_surat']}}</h2>
      <p>Nomor: [nomor_surat]</p>
    </div>

    <div>
      @php
      // Kelompokkan field berdasarkan kategori
      $fieldsByCategory = $jenisSuratField->groupBy('formFieldTemplate.category');

      // Urutan kategori yang diinginkan
      $categoryOrder = ['Pemohon', 'Tambahan', 'Target', 'Preview', 'Footer'];
      @endphp

      @foreach($categoryOrder as $category)
      @if(isset($fieldsByCategory[$category]))
      <div class="category-section">
        @if($category == 'Pemohon')
        {{-- Tampilkan data pemohon --}}
        <table>
          @foreach($fieldsByCategory[$category] as $field)
          @if(isset($proses_surat[$field->formFieldTemplate->name]))
          <tr>
            <td>{{$field->formFieldTemplate->label}}</td>
            <td>:</td>
            <td>
              @if($field->formFieldTemplate->name == 'tanggal_lahir')
              {{ $proses_surat['tempat_lahir'] }}, {{ $proses_surat['tanggal_lahir'] }}
              @else
              {{ $proses_surat[$field->formFieldTemplate->name] }}
              @endif
            </td>
          </tr>
          @endif
          @endforeach
        </table>

        {{-- Paragraf khusus untuk data pemohon --}}
        <p>
          Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di
          {{ $proses_surat['alamat'] ?? '-' }} RT {{ $proses_surat['rt'] ?? '-' }} RW {{ $proses_surat['rw'] ?? '-' }}
          Desa Rawapanjang, Kecamatan Bojonggede, Kabupaten Bogor.
        </p>

        @if(isset($proses_surat['keperluan']))
        <p>Surat Keterangan ini dibuat untuk keperluan: {{ $proses_surat['keperluan'] }}</p>
        @endif

        @elseif($category == 'Tambahan')
        {{-- Tampilkan data tambahan jika ada --}}
        <h3>Data Tambahan:</h3>
        <table>
          @foreach($fieldsByCategory[$category] as $field)
          @if(isset($proses_surat[$field->formFieldTemplate->name]) && !empty($proses_surat[$field->formFieldTemplate->name]))
          <tr>
            <td>{{$field->formFieldTemplate->label}}</td>
            <td>:</td>
            <td>
              @if($field->formFieldTemplate->type == 'repeater')
              {{-- Handle repeater field --}}
              @if(is_array($proses_surat[$field->formFieldTemplate->name]))
              <table style="margin-left: 20px;">
                @foreach($proses_surat[$field->formFieldTemplate->name] as $index => $item)
                <tr>
                  <td>{{ $index + 1 }}.</td>
                  <td>{{ $item['nama'] ?? '-' }} ({{ $item['nik'] ?? '-' }})</td>
                </tr>
                @endforeach
              </table>
              @endif
              @else
              {{ $proses_surat[$field->formFieldTemplate->name] }}
              @endif
            </td>
          </tr>
          @endif
          @endforeach
        </table>

        @elseif($category == 'Target')
        {{-- Tampilkan data target jika ada --}}
        <h3>Data yang Bersangkutan:</h3>
        <table>
          @foreach($fieldsByCategory[$category] as $field)
          @if(isset($proses_surat[$field->formFieldTemplate->name]) && !empty($proses_surat[$field->formFieldTemplate->name]))
          <tr>
            <td>{{$field->formFieldTemplate->label}}</td>
            <td>:</td>
            <td>
              @if($field->formFieldTemplate->name == 'target_tanggal_lahir')
              {{ $proses_surat['target_tempat_lahir'] ?? '-' }}, {{ $proses_surat['target_tanggal_lahir'] }}
              @else
              {{ $proses_surat[$field->formFieldTemplate->name] }}
              @endif
            </td>
          </tr>
          @endif
          @endforeach
        </table>

        @elseif($category == 'Preview')
        {{-- Tampilkan preview content jika ada --}}
        @foreach($fieldsByCategory[$category] as $field)
        @if($field->formFieldTemplate->type == 'file' && isset($proses_surat[$field->formFieldTemplate->name]))
        <div style="text-align: center; margin: 20px 0;">
          <p>{{ $field->formFieldTemplate->label }}</p>
          {{-- Tampilkan file preview jika diperlukan --}}
          <img src="{{ asset('storage/' . $proses_surat[$field->formFieldTemplate->name]) }}"
            alt="{{ $field->formFieldTemplate->label }}"
            style="max-width: 200px; max-height: 200px;">
        </div>
        @endif
        @endforeach
        @endif
      </div>
      @endif
      @endforeach

      {{-- Penutup surat --}}
      <p>Demikian surat keterangan ini dibuat dengan sebenarnya.</p>

      {{-- Footer dengan tanda tangan --}}
      @if(isset($fieldsByCategory['Footer']))
      <div style="text-align: right;">
        <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Pejabat Desa</p>

        @foreach($fieldsByCategory['Footer'] as $field)
        @if($field->formFieldTemplate->type == 'signature')
        <div class="signature">
          <br><br>
          @if(isset($proses_surat[$field->formFieldTemplate->name]))
          {{-- Tampilkan tanda tangan digital jika ada --}}
          <img src="{{ $proses_surat[$field->formFieldTemplate->name] }}"
            alt="{{ $field->formFieldTemplate->label }}"
            style="max-width: 200px; max-height: 100px;">
          @else
          <p>____________________</p>
          @endif
          <p>{{ str_replace(['Tanda Tangan ', 'ttd_'], '', $field->formFieldTemplate->label) }}</p>
        </div>
        @elseif($field->formFieldTemplate->type == 'file')
        {{-- Tampilkan pas foto di footer jika ada --}}
        @if(isset($proses_surat[$field->formFieldTemplate->name]))
        <div style="margin: 10px 0;">
          <img src="{{ asset('storage/' . $proses_surat[$field->formFieldTemplate->name]) }}"
            alt="{{ $field->formFieldTemplate->label }}"
            style="max-width: 100px; max-height: 120px;">
        </div>
        @endif
        @endif
        @endforeach
      </div>
      @else
      {{-- Default footer jika tidak ada field Footer --}}
      <div style="text-align: right;">
        <p>Rawapanjang, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Pejabat Desa</p>
        <div class="signature">
          <br><br>
          <p>____________________</p>
        </div>
      </div>
      @endif
    </div>
  </div>
</body>

</html>