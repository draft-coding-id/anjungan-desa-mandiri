@extends('layout.admin.app')
@section('title', 'Lapak Desa')
@section('content')

<h4>Lapak Desa</h4>
<h2>Data Pembangunan Desa Rawapanjang</h2>
<div class="main-container">
  @hasanyrole('admin|kades|rw')
  <button class="add-button" onclick="openModal()">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    Tambah Data Lapak
  </button>
  @endhasanyrole

  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th>Nama Lapak</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Pemilik</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($lapaks as $lapak)
        <tr>
          <td>{{ $lapak->nama }}</td>
          <td>{{ $lapak->kategori }}</td>
          <td>Rp {{ number_format($lapak->harga, 0, ',', '.') }}</td>
          <td>{{ $lapak->warga->nama_lengkap ?? '-' }}</td>
          <td>
            <a href="{{ route('lapaks.show', $lapak->id) }}" class="button">Lihat</a>
            <a href="{{route('lapaks.edit' , $lapak->id)}}" class="btn btn-primary">Edit</a>
            <a href="#" onclick="openDeleteModal({{ $lapak->id }})" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="text-align: center">Belum ada data lapak</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center">
    {{ $lapaks->links() }}
  </div>
  <div id="tambahModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Tambah Data Warga
        </div>
        <button class="close" onclick="closeModal()">×</button>
      </div>
      @if ($errors->any())
      <div class="alert alert-danger" style="margin-bottom: 20px; border-radius: 10px; background: linear-gradient(90deg,#ff8a00,#f7e700); color: #333; font-weight: 500; box-shadow: 0 4px 15px rgba(255,138,0,0.15);">
        <ul style="margin: 0; padding-left: 20px;">
          @foreach ($errors->all() as $error)
          <li style="margin-bottom: 5px;">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form id="tambahForm" action="{{ route('lapaks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="gambar">Gambar Lapak:</label>
          <input type="file" id="gambar" name="gambar" accept="image/*">

          {{-- Optional: tampilkan error untuk gambar --}}
          @error('gambar')
          <div style="color: red;">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="nama">Nama Lapak:</label>
          <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lapak">
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi:</label>
          <textarea id="deskripsi" name="deskripsi" required placeholder="Masukkan deskripsi lapak"></textarea>
        </div>

        <div class="form-group">
          <label for="kategori">Kategori:</label>
          <select name="kategori">
            <option value="makanan">Makanan</option>
            <option value="bangunan">Bangunan</option>
            <option value="jasa servis">Jasa Servis</option>
            <option value="minuman">Minuman</option>
          </select>
        </div>

        <div class="form-group">
          <label for="harga">Harga:</label>
          <input type="number" id="harga" name="harga" required placeholder="Masukkan harga (tanpa titik/koma)">
        </div>
        <div class="form-group">
          <label for="no_hp">No HP:</label>
          <input type="number" id="no_hp" name="no_hp" required placeholder="Masukkan No HP">
        </div>

        <div class="form-group">
          <label for="link_gmaps">Link Google Maps:</label>
          <input type="url" id="link_gmaps" name="link_gmaps" placeholder="https://maps.google.com/...">
        </div>

        <div class="form-group">
          <label for="warga_id">Pilih Warga:</label>
          <select id="warga_id" name="warga_id" required>
            <option value="">-- Pilih Warga --</option>
            @foreach ($wargas as $warga)
            <option value="{{ $warga->id }}">{{ $warga->nama_lengkap }}</option>
            @endforeach
          </select>
        </div>

        <div class="button-container">
          <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
          <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20,6 9,17 4,12"></polyline>
            </svg>
            Simpan Lapak
          </button>
        </div>
      </form>

    </div>
  </div>
  <div id="deleteModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">Konfirmasi Hapus</div>
        <button type="button" class="close" onclick="closeDeleteModal()">&times;</button>
      </div>
      <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')

        <p>Apakah Anda yakin ingin menghapus lapak ini?</p>

        <div class="button-container">
          <button type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@if ($errors->any())
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tambahModal').classList.add('show');
    document.body.style.overflow = 'hidden';
  });
</script>
@endif
<script>
  function openModal() {
    document.getElementById('tambahModal').classList.add('show');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    document.getElementById('tambahModal').classList.remove('show');
    document.body.style.overflow = 'auto';
    document.getElementById('tambahForm').reset();
  }

  // Close modal when clicking outside
  document.getElementById('tambahModal').addEventListener('click', function(e) {
    if (e.target === this) {
      closeModal();
    }
  });


  // Handle escape key to close modal
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeModal();
    }
  });

  function openDeleteModal(id) {
    document.getElementById('deleteForm').action = '/lapak-desa/' + id;
    document.getElementById('deleteModal').classList.add('show');
  }

  function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
  }
</script>