<style>
    .body-surat {
      background: #ffffff;
      font-family: 'Times New Roman', serif;
      margin: 0;
      padding: 0;
    }
    

    .table-header {
        width: 100%;
        border: none;
        box-shadow: none;
        background: white;
        text-align: center;
    }

    .table-header td {
        vertical-align: middle;
        border: none;
        background: white;
        padding: 0;
    }

    .table-data {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: none !important;
        border: none;
        border-radius: 0%;
    }

    .table-data td {
        padding: 8px;
        vertical-align: top;
        border: none;
        background-color: white;
        text-align: left;
    }

    .table-data td:first-child {
        width: 30px;
    }

    .table-data td:nth-child(2) {
        width: 200px;
    }

    .table-data td:nth-child(3) {
        width: 10px;
    }

    .table-data td:nth-child(4) {
        padding-left: 10px;
    }


    h1,
    h2 {
      font-size: 24px;
      font-weight: normal;
    }

    p {
      line-height: 1.5;
    }

    .center {
      text-align: center;
    }

    .content {
      margin-left: 50px;
    margin-right: 50px;
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

    /* .content table {
      width: 100%;
      box-shadow: 0;
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
    } */

    hr {
      border: 1px solid #000;
      margin-top: 30px;
    }

    .ttds {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 50px;
        margin-top: 40px;
        align-items: end; /* align semua item ke bawah */
    }

    .ttd {
        text-align: center;
        /* min-height: 220px; */
    }

    .ttd p {
        margin: 4px 0;
    }
    .ttd img {
        margin: 8px 0;
    }
</style>


<div class="body-surat">
    <div class="heading">
        <table class="table-header" width="100%">
            <tr>
                <td width="15%" style="text-align: center; vertical-align: middle;">
                    <img src="{{ asset('assets/logo.png') }}" style="width: 100%; max-width: 100px; height: auto;" alt="Logo Pemkab Bogor">
                </td>
                <td width="70%" style="text-align: center;">
                    <h1>PEMERINTAH KABUPATEN BOGOR<br>KECAMATAN BOJONGGEDE<br>DESA RAWAPANJANG</h1>
                    <p style="margin-top:10px; margin-bottom:0px;">Jl. Talang Kp Kelapa RT.02 RW.15 No.02 Kode Pos 16920</p>
                </td>
                <td width="15%" style="text-align: center; vertical-align: middle;">
                    {{-- <img src="{{ asset('assets/logo.png') }}" style="width: 100%; max-width: 100px; height: auto;" alt="Logo Pemkab Bogor"> --}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr style="border: 2px solid black;">
                </td>
            </tr>
        </table>

    </div>
    @php
        $fields = $jenisSurat->jenisSuratFields->filter(function ($field) {
            return in_array($field->formFieldTemplate->category, ['Wajib', 'Pemohon', 'Tambahan']);
        })->sortBy(function ($field) {
            // Urutan: Wajib (0), Pemohon (1), Tambahan (2)
            switch ($field->formFieldTemplate->category) {
                case 'Wajib': return 0;
                case 'Pemohon': return 1;
                case 'Tambahan': return 2;
                case 'Target': return 3;
                default: return 4; // kategori lain (jika ada)
            }
        });
    @endphp


    <div class="content">
        <div class="center">
            <h2 style="margin-bottom: 0; font-weight: bold;">{{ $jenisSurat->nama }}</h2>
            <p style="margin-top: 4px; margin-bottom: 20px;">Nomor: [nomor_surat]</p>
        </div>
        <div>
            <p>Yang bertanda tangan di bawah ini:</p>
            <table class="table-data" border="0">
                @php
                    $no = 1;
                @endphp
                @foreach ($fields as $field)
                    @if ($field->formFieldTemplate->name != 'keperluan')
                        <tr>
                            <td style="width: 10%">{{ $no++ }}</td>
                            <td>{{ $field->formFieldTemplate->label }}</td>
                            <td style="padding-left: 10px;">: </td>
                            <td>[{{ $field->formFieldTemplate->name }}]</td>
                        </tr>
                    @endif
                @endforeach
            </table>
            @if ($jenisSurat->text_content)
                @foreach (json_decode($jenisSurat->text_content, true) as $item)
                <p>
                    {{ $item }}.
                </p>
                @endforeach
            @endif
            <p>Surat Keterangan ini dibuat untuk keperluan: [keperluan]</p>
            <p>Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="ttds">
            @foreach ($ttdFields as $ttd)
            <div class="ttd">
                <div class="">
                    <p>Rawapanjang, 24 Desember 2024</p>
                    <p>{{ Str::after($ttd->formFieldTemplate->label, 'Tanda Tangan ') }}</p>
                    <img src="{{asset('assets/ttd_kades.png')}}" height="116px" width="116px" alt="ttd_desa" />
                    <p>[nama_penanda_tangan]</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

