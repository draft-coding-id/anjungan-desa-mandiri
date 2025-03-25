<div class="sidebar-nav">
    <a href='{{route('admin-beranda')}}' class="nav-link {{ request()->routeIs('admin-beranda') ? 'active' : '' }}">Beranda</a>
    <a href='{{route('info-desa')}}' class="nav-link {{ request()->routeIs('info-desa') ? 'active' : '' }}">Informasi Desa</a>
    <a href='{{route('data-warga')}}' class="nav-link {{ request()->routeIs('data-warga') ? 'active' : '' }}">Data Warga</a>
    <a href='{{route('statistik')}}' class="nav-link {{ request()->routeIs('statistik') ? 'active' : '' }}">Statistik Desa</a>
    <a href='{{route('layanan-surat-dalam-proses')}}' class="nav-link {{ request()->routeIs('layanan-surat-*') ? 'active' : '' }}">Layanan Surat</a>
    <a href='{{route('pengumuman')}}' class="nav-link {{ request()->routeIs('pengumuman') ? 'active' : '' }}">Pengumuman</a>
    <a href='{{route('artikel-desa')}}' class="nav-link {{ request()->routeIs('artikel-desa') ? 'active' : '' }}">Artikel Desa</a>
    <a href='{{route('agenda')}}' class="nav-link {{ request()->routeIs('agenda') ? 'active' : '' }}">Agenda Desa</a>
    <a href='/pengaturan-akun' class="nav-link {{ request()->is('pengaturan-akun') ? 'active' : '' }}">Pengaturan Akun</a>
    <a href='/admin' class="nav-link {{ request()->is('admin') ? 'active' : '' }}">Logout</a>
</div>
