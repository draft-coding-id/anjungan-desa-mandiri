<div class="menu-surat">
  <a href='{{route('info-desa.index')}}'
    class="{{request()->routeIs('info-desa*') ? 'active' : ''}}">Sejarah Desa</a>
  <a href='{{route('info-desa.visi-misi')}}'
    class="{{request()->routeIs('info-desa.visi-misi*') ? 'active' : ''}}">Visi Misi</a>
</div>