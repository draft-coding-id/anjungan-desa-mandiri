@extends('layout.admin.app')
@section('title', 'Kelola Jenis Surat')

@section('content')
<div class="path">
    <h4>Layanan Surat > Kelola Surat</h4>
</div>

@include('layout.admin.menu_surat')

<div class="main-container">
    <h4>Data Jenis Surat</h4>

    <button class="add-button" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
        Tambah Jenis Surat
    </button>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Jumlah Field</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jenisSurats as $surat)
                <tr>
                    <td>{{ $surat->nama }}</td>
                    <td>{{ $surat->kode }}</td>
                    <td>{{ $surat->kategori->nama ?? '-' }}</td>
                    <td>{{ $surat->jenisSuratFields->count() }} field</td>
                    <td>
                        <a href="{{ route('kelola-surat.show', $surat->id) }}" class="btn btn-primary">Show</a>
                        <a href="#" onclick="openDeleteModal({{ $surat->id }})" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada jenis surat</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $jenisSurats->links() }}
    </div>

    <!-- Modal Tambah -->
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Tambah Jenis Surat</div>
                <button class="close" onclick="closeModal()">×</button>
            </div>
            <form id="tambahForm" method="POST" action="{{ route('kelola-surat.store') }}">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Surat:</label>
                    <input type="text" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="kode">Kode Surat:</label>
                    <select name="kode" required>
                        <option value="">-- Pilih Kode --</option>
                        <option value="SKD">(SKD) Surat Keterangan Domisisli</option>
                        <option value="SKKTP">(SKKTP) Surat Keterangan KTP dalam Proses</option>
                        <option value="SKP">(SKP) Surat Keterangan Penduduk</option>
                        <option value="SKPP">(SKPP) Surat Keterangan Pindah Penduduk</option>
                        <option value="SPKK">(SPKK) Surat Permohonan Kartu Keluarga</option>
                        <option value="SPPKK">(SPPKK) Surat Permohonan Perubahan KK</option>
                        <option value="SKK">(SKK) Surat Keterangan Kematian</option>
                        <option value="SPMAK">(SPMAK) Surat Pernyataan Membuat Akta Kelahiran</option>
                        <option value="SKM">(SKM) Surat Keterangan Menikah</option>
                        <option value="SKW">(SKW) Surat Keterangan Wali</option>
                        <option value="SKWH">(SKWH) Surat Keterangan Wali Hakim</option>
                        <option value="SPC">(SPC) Surat Permohonan Cerai</option>
                        <option value="SPJD">(SPJD) Surat Pernyataan Janda/Duda</option>
                        <option value="SIK">(SIK) Surat Izin Keramaian</option>
                        <option value="SKPG">(SKPG) Surat Keterangan Pengantar</option>
                        <option value="SKTM">(SKTM) Surat Keterangan Tidak Mampu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kategori_id">Kategori:</label>
                    <select name="kategori_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Text Content Repeater Section -->
                <div class="form-group">
                    <label>Konten Teks Tambahan:</label>
                    <div class="repeater-container">
                        <div class="repeater-header">
                            <button type="button" class="btn btn-success btn-sm" onclick="addTextContentRow()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Tambah Konten Teks
                            </button>
                        </div>

                        <table class="table table-bordered" id="textContentTable">
                            <thead>
                                <tr>
                                    <th width="80%">Konten Teks</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="textContentTableBody">
                                <!-- Rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Form Fields Selection -->
                @foreach($formFieldTemplates as $category => $templates)
                <div class="checkbox-section">
                    <h5>
                        @switch($category)
                        @case('Primary')
                        🧍 Primary Data / Data Pemohon
                        @break
                        @case('Tambahan')
                        📌 Data Tambahan
                        @break
                        @case('Secondary')
                        🎯 Secondary Data / Data Terkait
                        @break
                        @case('Dokumen')
                        📄 Dokumen Pendukung
                        @break
                        @case('Informasi')
                        📝 Informasi Tambahan
                        @break
                        @case('Footer')
                        ✍️ Footer / Tanda Tangan
                        @break
                        @default
                        {{ $category }}
                        @endswitch
                    </h5>
                    <div class="checkbox-grid">
                        @foreach($templates as $template)
                        <label class="checkbox-item">
                            <input type="checkbox"
                                name="form_fields[]"
                                value="{{ $template->id }}"
                                @if($template->is_always_active) checked disabled @endif>
                            {{ $template->label }}
                            @if($template->is_always_active)
                            <small>(selalu aktif)</small>
                            @endif
                        </label>
                        @if($template->is_always_active)
                        <input type="hidden" name="form_fields[]" value="{{ $template->id }}">
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach

                <div class="button-container">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Konfirmasi Hapus</div>
                <button type="button" class="close" onclick="closeDeleteModal()">&times;</button>
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <p>Surat akan terhapus secara permanen oleh sistem. Apakah Anda yakin ingin menghapus pilihan surat ini?</p>
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
        openModal();
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

    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = '/kelola-surat/delete/' + id;
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }
    let textContentRowIndex = 0;

    function addTextContentRow() {
        const tableBody = document.getElementById('textContentTableBody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
        <td>
            <textarea name="text_content[${textContentRowIndex}]" 
                      class="form-control-sm" 
                      placeholder="Masukkan konten teks..." 
                      rows="3"
                      maxlength="500"
                      style="width: 100%; resize: vertical;"></textarea>
            <small style="color: #666; font-size: 12px;">Maksimal 500 karakter</small>
        </td>
        <td style="text-align: center;">
            <button type="button" class="btn-remove" onclick="removeTextContentRow(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                Hapus
            </button>
        </td>
    `;

        tableBody.appendChild(newRow);
        textContentRowIndex++;
    }

    function removeTextContentRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>