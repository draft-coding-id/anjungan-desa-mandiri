@extends('layout.warga.tentang-desa-layout')
@section('content')
<div class="container" style="height: 100%">
    <h1>{{$sejarahDesa->judul}}</h1>
    <p class="sejarah-desa-content">
        {{ $sejarahDesa->content }}
    </p>
    <div class="kepala-desa">
        <p>KEPALA DESA RAWAPANJANG :</p>
        <ul>
            @foreach($sejarahDesa->pemimpin_desa as $item)
            <li>
                <strong>{{ $item['nama'] }}</strong><br>
                <small class="text-muted">
                    {{ \Carbon\Carbon::parse($item['mulai_jabat'])->translatedFormat('d F Y') }} -
                    {{ \Carbon\Carbon::parse($item['akhir_jabat'])->translatedFormat('d F Y') }}
                </small>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@section('footer')
@include('layout.warga.tentang-desa-navbar')
@endsection
@endsection