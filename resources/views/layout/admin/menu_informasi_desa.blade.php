<div class="menu-surat">
  <a href='{{route('info-desa.sejarah-desa.index')}}'
    class="{{request()->routeIs('info-desa.sejarah-desa.*') ? 'active' : ''}}">Sejarah Desa</a>
  <a href='{{route('info-desa.visi-misi.index')}}'
    class="{{request()->routeIs('info-desa.visi-misi.*') ? 'active' : ''}}">Visi Misi</a>
</div>