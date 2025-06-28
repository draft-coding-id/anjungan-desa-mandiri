<!-- Modal Edit Sejarah Desa -->
@extends('layout.admin.informasi_desa')
@section('title', 'Edit Sejarah Desa')
@section('content')
@if ($errors->any())
<div class="alert alert-danger" style="margin-bottom: 20px; border-radius: 10px; background: linear-gradient(90deg,#ff8a00,#f7e700); color: #333; font-weight: 500; box-shadow: 0 4px 15px rgba(255,138,0,0.15);">
  <ul style="margin: 0; padding-left: 20px;">
    @foreach ($errors->all() as $error)
    <li style="margin-bottom: 5px;">{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div id="editModal" class="modal" tabindex="-1" style="display: flex; align-items:center ; justify-content:center">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Edit Sejarah Desa</div>
      <a href="{{ route('info-desa.sejarah-desa.index') }}" class="close">&times;</a>
    </div>
    <form id="editForm" method="POST" action="{{ route('info-desa.sejarah-desa.update', $sejarahDesa->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="edit-id" value="{{ $sejarahDesa->id }}">

      <div class="form-group">
        <label for="edit-judul">Judul</label>
        <input type="text" name="judul" id="edit-judul" value="{{ $sejarahDesa->judul }}" required>
      </div>

      <div class="form-group">
        <label for="edit-content">Konten</label>
        <textarea name="content" id="edit-content" required>{{ $sejarahDesa->content }}</textarea>
      </div>

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
              @if(isset($sejarahDesa->pemimpin_desa) && is_array($sejarahDesa->pemimpin_desa))
              @foreach ($sejarahDesa->pemimpin_desa as $index => $pemimpin)
              <tr>
                <td>
                  <input type="text"
                    name="pemimpin_desa[{{ $index }}][nama]"
                    class="form-control-sm"
                    value="{{ $pemimpin['nama'] ?? '' }}"
                    placeholder="Nama Pemimpin"
                    required>
                </td>
                <td>
                  <input type="date"
                    name="pemimpin_desa[{{ $index }}][mulai_jabat]"
                    class="form-control-sm"
                    value="{{ $pemimpin['mulai_jabat'] ?? '' }}"
                    required>
                </td>
                <td>
                  <input type="date"
                    name="pemimpin_desa[{{ $index }}][akhir_jabat]"
                    class="form-control-sm"
                    value="{{ $pemimpin['akhir_jabat'] ?? '' }}"
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
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>

      <div class="button-container">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('info-desa.sejarah-desa.index') }}" class="btn btn-secondary">Tutup</a>
      </div>
    </form>
  </div>
</div>

<script>
  // Initialize pemimpinRowIndex with proper check
  let pemimpinRowIndex = {{isset($sejarahDesa->pemimpin_desa) && is_array($sejarahDesa->pemimpin_desa) ? count($sejarahDesa->pemimpin_desa) : 0}};

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
    if (row) {
      row.remove();
    }
  }

  // Optional: Add form validation
  document.getElementById('editForm').addEventListener('submit', function(e) {
    const namaInputs = document.querySelectorAll('input[name*="[nama]"]');
    const mulaiJabatInputs = document.querySelectorAll('input[name*="[mulai_jabat]"]');
    const akhirJabatInputs = document.querySelectorAll('input[name*="[akhir_jabat]"]');

    // Check if all required fields are filled
    let isValid = true;

    namaInputs.forEach(input => {
      if (!input.value.trim()) {
        isValid = false;
        input.style.borderColor = '#dc3545';
      } else {
        input.style.borderColor = '';
      }
    });

    mulaiJabatInputs.forEach(input => {
      if (!input.value) {
        isValid = false;
        input.style.borderColor = '#dc3545';
      } else {
        input.style.borderColor = '';
      }
    });

    akhirJabatInputs.forEach(input => {
      if (!input.value) {
        isValid = false;
        input.style.borderColor = '#dc3545';
      } else {
        input.style.borderColor = '';
      }
    });

    if (!isValid) {
      e.preventDefault();
      alert('Mohon lengkapi semua field yang diperlukan!');
    }
  });
</script>
@endsection