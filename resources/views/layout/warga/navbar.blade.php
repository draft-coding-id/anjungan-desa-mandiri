<div class="footer">
    <h3>Silahkan pilih menu yang Anda perlukan hari ini.</h3>
    {{-- <h2>{{auth('warga')->user()->nama_lengkap}}</h2> --}}
    <div class="button-container">
        <a href="{{route('dashboard')}}" class="button">Persuratan Digital</a>
        <a href='/tentang-desa-rawapanjang' class="button">Tentang Desa <br>Rawapanjang</a>
        <a href='/agenda-rawapanjang' class="button">Agenda <br>Rawapanjang</a>
        <a href='/lapak-warga' class="button">Lapak</a>
    </div>
    <div class="credit">
        <p>(c) Trisna Wahyu Mukti, Raihan Darmawan Pringgodigdo, Fakultas Ilmu Komputer
            Universitas Pembangunan Nasional "Veteran" Jakarta</p>
    </div>
</div>