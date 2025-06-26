@extends('layout.admin.app')
@section('title', 'Kabar Pembangunan Desa Rawapanjang')
@section('content')
<h4>Kabar Pembangunan</h4>

<h2>Data Pembangunan Desa Rawapanjang</h2>
<div class="main-container">
  @hasanyrole('admin|kades|rw')
  <button class="add-button" onclick="openModal()">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    Tambah Data Pembangunan
  </button>
  @endhasanyrole

  <!-- Modal Tambah -->
  <div id="tambahModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Tambah Data Pembangunan
        </div>
        <button class="close" onclick="closeModal()">×</button>
      </div>

      <form id="tambahForm" action="{{route('pembangunan-desa.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Nama Pembangunan:<span style="color: red;">*</span></label>
          <input type="text" id="nama" name="nama" required placeholder="Masukkan nama pembangunan">
        </div>

        <div class="form-group">
          <label>Foto:</label>
          <input type="file" id="foto" name="foto" accept="image/*" placeholder="Pilih foto pembangunan">
          <small class="text-muted">Format: JPG, PNG, JPEG (Max: 2MB)</small>
        </div>

        <div class="form-group">
          <label>Tahun:<span style="color: red;">*</span></label>
          <input type="number" id="tahun" name="tahun" required placeholder="Masukkan tahun" min="2000" max="2030">
        </div>

        <div class="form-group">
          <label>Anggaran:<span style="color: red;">*</span></label>
          <input type="number" id="anggaran" name="anggaran" required placeholder="Masukkan anggaran dalam rupiah">
        </div>

        <div class="form-group">
          <label>Link Google Maps:</label>
          <input type="url" id="link_gmaps" name="link_gmaps" placeholder="https://maps.google.com/...">
        </div>

        <div class="form-group">
          <label>Volume:<span style="color: red;">*</span></label>
          <input type="text" id="volume" name="volume" required placeholder="Contoh: 500 meter, 10 unit, dll">
        </div>

        <div class="form-group">
          <label>Sumber Dana:<span style="color: red;">*</span></label>
          <select id="sumber_dana" name="sumber_dana" required>
            <option value="">Pilih sumber dana</option>
            <option value="APBD">APBD</option>
            <option value="APBN">APBN</option>
            <option value="Dana Desa">Dana Desa</option>
            <option value="Swadaya Masyarakat">Swadaya Masyarakat</option>
            <option value="CSR">CSR</option>
            <option value="Hibah">Hibah</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>

        <div class="form-group">
          <label>Pelaksana:<span style="color: red;">*</span></label>
          <input type="text" id="pelaksana" name="pelaksana" required placeholder="Nama perusahaan/kontraktor pelaksana">
        </div>

        <div class="form-group">
          <label>Lokasi:<span style="color: red;">*</span></label>
          <textarea id="lokasi" name="lokasi" required placeholder="Masukkan lokasi pembangunan"></textarea>
        </div>

        <div class="form-group">
          <label>Manfaat:<span style="color: red;">*</span></label>
          <textarea id="manfaat" name="manfaat" required placeholder="Jelaskan manfaat pembangunan ini"></textarea>
        </div>

        <div class="form-group">
          <label>Keterangan:</label>
          <textarea id="keterangan" name="keterangan" placeholder="Keterangan tambahan (opsional)"></textarea>
        </div>

        <div class="button-container">
          <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
          <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20,6 9,17 4,12"></polyline>
            </svg>
            Simpan Data
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Detail -->
  <div id="detailModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Detail Pembangunan
        </div>
        <button class="close" onclick="closeDetailModal()">×</button>
      </div>
      <div id="detailContent" class="modal-body">
        <!-- Content will be loaded here -->
      </div>
      <div class="button-container">
        <button type="button" class="btn btn-secondary" onclick="closeDetailModal()">Tutup</button>
      </div>
    </div>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        @hasanyrole('admin|kades|rw')
        <th width="500px">Aksi</th>
        @endhasanyrole
        <th>Foto</th>
        <th>Nama Pembangunan</th>
        <th>Tahun</th>
        <th>Anggaran</th>
        <th>Volume</th>
        <th>Sumber Dana</th>
        <th>Lokasi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pembangunan as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        @hasanyrole('admin|kades|rw')
        <td>
          <a href="{{ route('pembangunan-desa.show' , $item->id) }}" class="button">Detail Pembangunan</a>
          <a href="{{ route('pembangunan-desa.edit' , $item->id) }}" class="button">Edit Pembangunan</a>
          @hasanyrole('admin|kades')
          <button onclick="openDeleteModal({{ $item->id }})">Hapus</button>
          @endhasanyrole
        </td>
        @endhasanyrole
        <td>
          @if($item->foto)
          <img src="{{asset('storage/' . $item->foto)}}"
            alt="{{$item->nama}}"
            style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px; cursor: pointer;"
            onclick="previewFoto('{{asset('storage/' . $item->foto)}}', '{{$item->nama}}')">
          @else
          <div style="width: 80px; height: 60px; background: #f8f9fa; border: 1px dashed #dee2e6; display: flex; align-items: center; justify-content: center; border-radius: 4px;">
            <small class="text-muted">No Image</small>
          </div>
          @endif
        </td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->tahun }}</td>
        <td>Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
        <td>{{ $item->volume }}</td>
        <td>{{ $item->sumber_dana }}</td>
        <td>
          {{ $item->lokasi }}
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="11" style="text-align: center">Belum ada data pembangunan</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  <div id="deleteModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">Konfirmasi Hapus</div>
        <button type="button" class="close" onclick="closeDeleteModal()">&times;</button>
      </div>
      <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')

        <p>Apakah Anda yakin ingin menghapus pembangunan ini ?</p>

        <div class="button-container">
          <button type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('tambahModal').classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function openDeleteModal(id) {
      document.getElementById('deleteForm').action = '/pembangunan-desa/' + id;
      document.getElementById('deleteModal').classList.add('show');
    }

    function closeModal() {
      document.getElementById('tambahModal').classList.remove('show');
      document.body.style.overflow = 'auto';
      document.getElementById('tambahForm').reset();
    }

    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.remove('show');
    }

    function closeDetailModal() {
      document.getElementById('detailModal').classList.remove('show');
      document.body.style.overflow = 'auto';
    }
  </script>
  @endsection