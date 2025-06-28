@extends('layout.admin.informasi_desa')
@section('title' , 'Informasi Desa')
@section('content')
<h4>Informasi Desa > Visi Misi</h4>
@include('layout.admin.menu_informasi_desa')
<h4>Visi Misi</h4>
<div class="content">
  @hasanyrole('admin|kades|rw')
  <button class="add-button" onclick="openModal()">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    Tambah Data Visi Misi
  </button>
  @endhasanyrole

  <!-- Modal Tambah -->
  <div id="tambahModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Tambah Data Visi Misi
        </div>
        <button class="close" onclick="closeModal()">×</button>
      </div>

      <form id="tambahForm" action="{{route('info-desa.visi-misi.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Judul:<span style="color: red;">*</span></label>
          <input type="text" id="judul" name="judul" required placeholder="Masukkan Judul (contoh: Visi atau Misi)">
        </div>

        <!-- Table Repeater Konten -->
        <div class="form-group">
          <label>Konten:<span style="color: red;">*</span></label>
          <div class="repeater-container">
            <div class="repeater-header">
              <button type="button" class="btn btn-success btn-sm" onclick="addKontenRow()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Konten
              </button>
            </div>

            <table class="table table-bordered" id="kontenTable">
              <thead>
                <tr>
                  <th width="80%">Isi Konten</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody id="kontenTableBody">
                <!-- Untuk baris konten -->
              </tbody>
            </table>
          </div>
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

  <!-- Modal Edit -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Edit Data Visi Misi
        </div>
        <button class="close" onclick="closeEditModal()">×</button>
      </div>

      <form id="editForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Judul:<span style="color: red;">*</span></label>
          <input type="text" id="edit_judul" name="judul" required placeholder="Masukkan Judul (contoh: Visi atau Misi)">
        </div>

        <!-- Table Repeater Konten untuk Edit -->
        <div class="form-group">
          <label>Konten:<span style="color: red;">*</span></label>
          <div class="repeater-container">
            <div class="repeater-header">
              <button type="button" class="btn btn-success btn-sm" onclick="addEditKontenRow()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Konten
              </button>
            </div>

            <table class="table table-bordered" id="editKontenTable">
              <thead>
                <tr>
                  <th width="80%">Isi Konten</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody id="editKontenTableBody">
                <!-- Untuk baris konten edit -->
              </tbody>
            </table>
          </div>
        </div>

        <div class="button-container">
          <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
          <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20,6 9,17 4,12"></polyline>
            </svg>
            Update Data
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
          Detail Visi Misi
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

  <!-- Modal Delete -->
  <div id="deleteModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">Konfirmasi Hapus</div>
        <button type="button" class="close" onclick="closeDeleteModal()">&times;</button>
      </div>
      <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')

        <p>Apakah Anda yakin ingin menghapus data visi misi ini?</p>

        <div class="button-container">
          <button type="submit" class="btn btn-danger">Hapus</button>
          <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
        </div>
      </form>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th width="500px">Aksi</th>
        <th>Judul</th>
        <th>Konten</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($visiMisi as $data)
      <tr>
        <td>{{$increment++}}</td>
        @hasanyrole('admin')
        <td>
          <a href="{{route('info-desa.visi-misi.show' , $data->id)}}" >Detail Visi Misi</a>
          <a href="{{route('info-desa.visi-misi.edit' , $data->id)}}" class="button">Edit Visi Misi</a>
          <a onclick="openDeleteModal({{ $data->id }})" class="button">Hapus</a>
        </td>
        @endhasanyrole
        @hasanyrole('kades|rw|rt')
        <td>
          <button onclick="openDetailModal({{ $data->id }})" class="button">Detail Visi Misi</button>
        </td>
        @endhasanyrole
        <td>{{ $data->judul }}</td>
        <td>
          @if(is_array($data->konten) && count($data->konten) > 0)
          <ul>
            @foreach(array_slice($data->konten, 0, 2) as $item)
            <li>{{ \Illuminate\Support\Str::limit($item, 50, '...') }}</li>
            @endforeach
            @if(count($data->konten) > 2)
            <li><em>... dan {{ count($data->konten) - 2 }} item lainnya</em></li>
            @endif
          </ul>
          @else
          <em>Tidak ada konten</em>
          @endif
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" style="text-align: center">Belum ada data visi misi</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<script>
  let kontenRowIndex = 0;
  let editKontenRowIndex = 0;

  // Modal Functions
  function openModal() {
    document.getElementById('tambahModal').classList.add('show');
    document.body.style.overflow = 'hidden';
    // Add initial row when modal opens
    if (document.getElementById('kontenTableBody').children.length === 0) {
      addKontenRow();
    }
  }

  function closeModal() {
    document.getElementById('tambahModal').classList.remove('show');
    document.body.style.overflow = 'auto';
    document.getElementById('tambahForm').reset();
    // Clear repeater table
    document.getElementById('kontenTableBody').innerHTML = '';
    kontenRowIndex = 0;
  }

  function openDeleteModal(id) {
    document.getElementById('deleteForm').action = `/info-desa/visi-misi/delete/${id}`;
    document.getElementById('deleteModal').classList.add('show');
  }

  function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
  }

  // Konten Row Functions
  function addKontenRow() {
    const tableBody = document.getElementById('kontenTableBody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>
        <textarea name="konten[]" 
                  class="form-control-sm" 
                  placeholder="Masukkan isi konten" 
                  rows="3"
                  required></textarea>
      </td>
      <td style="text-align: center;">
        <button type="button" class="btn-remove" onclick="removeKontenRow(this)">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
          Hapus
        </button>
      </td>
    `;

    tableBody.appendChild(newRow);
    kontenRowIndex++;
  }

  function removeKontenRow(button) {
    const row = button.closest('tr');
    row.remove();
  }

  function addEditKontenRow(value = '') {
    const tableBody = document.getElementById('editKontenTableBody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>
        <textarea name="konten[]" 
                  class="form-control-sm" 
                  placeholder="Masukkan isi konten" 
                  rows="3"
                  required>${value}</textarea>
      </td>
      <td style="text-align: center;">
        <button type="button" class="btn-remove" onclick="removeEditKontenRow(this)">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
          Hapus
        </button>
      </td>
    `;

    tableBody.appendChild(newRow);
    editKontenRowIndex++;
  }

  function removeEditKontenRow(button) {
    const row = button.closest('tr');
    row.remove();
  }
</script>
@endsection