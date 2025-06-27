@extends('layout.admin.informasi_desa')
@section('title' , 'Informasi Desa')
@section('content')
<h4>Informasi Desa > Sejarah Desa</h4>
@include('layout.admin.menu_informasi_desa')
<h4>Sejarah Desa</h4>
<div class="content">
  @hasanyrole('admin|kades|rw')
  <button class="add-button" onclick="openModal()">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    Tambah Data Informasi
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

      <form id="tambahForm" action="{{route('info-desa.sejarah-desa.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Judul Informasi:<span style="color: red;">*</span></label>
          <input type="text" id="judul" name="judul" required placeholder="Masukkan Judul Informasi">
        </div>
        <div class="form-group">
          <label>Konten Informasi:<span style="color: red;">*</span></label>
          <input type="text" id="content" name="content" required placeholder="Masukkan Konten Informasi">
        </div>

        <!-- Table Repeater Pemimpin Desa -->
        <div class="form-group">
          <label>Data Pemimpin Desa:</label>
          <div class="repeater-container">
            <div class="repeater-header">
              <button type="button" class="btn btn-success btn-sm" onclick="addPemimpinRow()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Pemimpin
              </button>
            </div>

            <table class="table table-bordered" id="pemimpinTable">
              <thead>
                <tr>
                  <th width="30%">Nama Pemimpin</th>
                  <th width="25%">Mulai Jabat</th>
                  <th width="25%">Akhir Jabat</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody id="pemimpinTableBody">
                <!-- Untuk baris pemimpin -->
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

  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th width="500px">Aksi</th>
        <th>Judul</th>
        <th>Isi Konten</th>
        <th>Pemimpin</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($sejarahDesa as $data)
      <tr>
        <td>{{$increment++}}</td>
        @hasanyrole('admin')
        <td>
          <a href="{{ route('info-desa.sejarah-desa.edit' , $data->id) }}" class="button">Edit Informasi Desa</a>
          <button onclick="openDeleteModal({{ $data->id }})">Hapus</button>
        </td>
        @endhasanyrole
        @hasanyrole('kades|rw|rt')
        <td>
          <a href="{{ route('info-desa.sejarah-desa.show' , $data->id) }}" class="button">Detail Informasi Desa</a>
        </td>
        @endhasanyrole
        <td>{{ $data->judul }}</td>
        <td>{{ \Illuminate\Support\Str::limit($data->content, 75, '...' )}}</td>
        <td>
          <ul>
            @foreach($data->pemimpin_desa as $item)
            <li>{{ $item['nama'] }} ({{ $item['mulai_jabat'] }} - {{ $item['akhir_jabat'] }})</li>
            @endforeach
          </ul>
        </td>
        @empty
        <td colspan="12" style="text-align: center">Surat Sudah di kirim ke warga</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<script>
  let pemimpinRowIndex = 0;

  function openModal() {
    document.getElementById('tambahModal').classList.add('show');
    document.body.style.overflow = 'hidden';
    // Add initial row when modal opens
    if (document.getElementById('pemimpinTableBody').children.length === 0) {
      addPemimpinRow();
    }
  }

  function openDeleteModal(id) {
    document.getElementById('deleteForm').action = '/info-desa/delete/' + id;
    document.getElementById('deleteModal').classList.add('show');
  }

  function closeModal() {
    document.getElementById('tambahModal').classList.remove('show');
    document.body.style.overflow = 'auto';
    document.getElementById('tambahForm').reset();
    // Clear repeater table
    document.getElementById('pemimpinTableBody').innerHTML = '';
    pemimpinRowIndex = 0;
  }

  function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
  }

  function closeDetailModal() {
    document.getElementById('detailModal').classList.remove('show');
    document.body.style.overflow = 'auto';
  }

  function addPemimpinRow() {
    const tableBody = document.getElementById('pemimpinTableBody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>
        <input type="text" 
               name="pemimpin_desa[${pemimpinRowIndex}][nama]" 
               class="form-control-sm" 
               placeholder="Nama Pemimpin" 
               required>
      </td>
      <td>
        <input type="date" 
               name="pemimpin_desa[${pemimpinRowIndex}][mulai_jabat]" 
               class="form-control-sm" 
               required>
      </td>
      <td>
        <input type="date" 
               name="pemimpin_desa[${pemimpinRowIndex}][akhir_jabat]" 
               class="form-control-sm" 
               required>
      </td>
      <td style="text-align: center;">
        <button type="button" class="btn-remove" onclick="removePemimpinRow(this)">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
          Hapus
        </button>
      </td>
    `;

    tableBody.appendChild(newRow);
    pemimpinRowIndex++;
  }

  function removePemimpinRow(button) {
    const row = button.closest('tr');
    row.remove();
  }
</script>
@endsection