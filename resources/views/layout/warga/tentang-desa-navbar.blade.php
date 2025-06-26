<div class="footer-tentang-desa">
    <div class="button-container-tentang-desa">
        <a href="/warga" class="footer-button"">Kembali</a>
        <a href=" {{route('sejarah-desa')}}"
            class="footer-button {{ request()->routeIs('sejarah-desa') ? 'active' : '' }}">Sejarah Desa <br>
            Rawapanjang</a>
        <a href="{{route('visi-misi')}}"" class=" footer-button {{ request()->routeIs('visi-misi') ? 'active' : '' }}">Visi Misi <br> Desa</a>
        <a href="{{route('statistik-desa')}}" class="footer-button {{ request()->routeIs('statistik-desa') ? 'active' : '' }}">Statistik Desa</a>
        <a href="{{route('kabar-pembangunan')}}" class="footer-button {{ request()->routeIs('kabar-pembangunan') ? 'active' : '' }}">Kabar Pembangunan</a>
    </div>
</div>