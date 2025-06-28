<!-- Modal Edit Visi Misi -->
@extends('layout.admin.informasi_desa')
@section('title', 'Edit Visi Misi')
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
      <div class="modal-title">Edit {{$visiMisi->judul}}</div>
      <a href="{{ route('info-desa.visi-misi.index') }}" class="close">&times;</a>
    </div>
    <form id="editForm" method="POST" action="{{ route('info-desa.visi-misi.update', $visiMisi->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="edit-id" value="{{ $visiMisi->id }}">

      <div class="form-group">
        <label for="edit-judul">Judul:<span style="color: red;">*</span></label>
        <input type="text" name="judul" id="edit-judul" value="{{ $visiMisi->judul }}" placeholder="Masukkan Judul (contoh: Visi atau Misi)" required>
      </div>

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
              @if(isset($visiMisi->konten) && is_array($visiMisi->konten))
              @foreach ($visiMisi->konten as $index => $kontenItem)
              <tr>
                <td>
                  <textarea name="konten[]"
                    class="form-control-sm"
                    placeholder="Masukkan isi konten"
                    rows="3"
                    required>{{ $kontenItem ?? '' }}</textarea>
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
              </tr>
              @endforeach
              @else
              <!-- Default row if no content exists -->
              <tr>
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
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>

      <div class="button-container">
        <button type="submit" class="btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20,6 9,17 4,12"></polyline>
          </svg>
          Simpan Perubahan
        </button>
        <a href="{{ route('info-desa.visi-misi.index') }}" class="btn btn-secondary">Tutup</a>
      </div>
    </form>
  </div>
</div>

<script>
  // Initialize kontenRowIndex based on existing content count
  let kontenRowIndex = {
    {
      isset($visiMisi - > konten) && is_array($visiMisi - > konten) ? count($visiMisi - > konten) : 1
    }
  };

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
    const tableBody = document.getElementById('kontenTableBody');

    // Prevent removing the last row (ensure at least one content row exists)
    if (tableBody.children.length > 1) {
      if (row) {
        row.remove();
      }
    } else {
      alert('Minimal harus ada satu konten!');
    }
  }

  // Form validation
  document.getElementById('editForm').addEventListener('submit', function(e) {
    const judulInput = document.getElementById('edit-judul');
    const kontenInputs = document.querySelectorAll('textarea[name="konten[]"]');

    let isValid = true;

    // Validate judul
    if (!judulInput.value.trim()) {
      isValid = false;
      judulInput.style.borderColor = '#dc3545';
    } else {
      judulInput.style.borderColor = '';
    }

    // Validate konten
    kontenInputs.forEach(input => {
      if (!input.value.trim()) {
        isValid = false;
        input.style.borderColor = '#dc3545';
      } else {
        input.style.borderColor = '';
      }
    });

    // Check if at least one content exists
    if (kontenInputs.length === 0) {
      isValid = false;
      alert('Minimal harus ada satu konten!');
    }

    if (!isValid) {
      e.preventDefault();
      alert('Mohon lengkapi semua field yang diperlukan!');
    }
  });

  // Auto-resize textareas
  document.addEventListener('DOMContentLoaded', function() {
    const textareas = document.querySelectorAll('textarea[name="konten[]"]');
    textareas.forEach(textarea => {
      autoResize(textarea);
      textarea.addEventListener('input', function() {
        autoResize(this);
      });
    });
  });

  function autoResize(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
  }

  // Add event listener for dynamically added textareas
  document.addEventListener('click', function(e) {
    if (e.target.closest('.btn.btn-success.btn-sm')) {
      setTimeout(() => {
        const newTextarea = document.querySelector('#kontenTableBody tr:last-child textarea');
        if (newTextarea) {
          newTextarea.addEventListener('input', function() {
            autoResize(this);
          });
        }
      }, 100);
    }
  });
</script>
@endsection