<div class="footer">
    <h3>Silahkan pilih menu yang Anda perlukan hari ini.</h3>
    {{-- <h2>{{auth('warga')->user()->nama_lengkap}}</h2> --}}
    <div class="button-container">
        <!-- <button class="button" onclick="window.location.href='/layanan_digital';">Layanan Digital</button> -->
        <a href="{{route('dashboard')}}" class="button">Dashboard</a>
        <a href='/pengumuman-warga' class="button">Pengumuman</a>
        <a href='/tentang-desa-rawapanjang' class="button">Tentang Desa <br>Rawapanjang</a>
        <a href='/agenda-rawapanjang' class="button">Agenda <br>Rawapanjang</a>
        <a href='/lapak-warga' class="button">Lapak</a>
        <a href='/artikel-terkini' class="button">Artikel <br>Terkini</a>
        @auth('warga')
        <a href='/logout' class="button">Logout</a>
        @endauth
    </div>
    <div class="credit">
        <p>&copy;</p>
    </div>
</div>