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
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode Surat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jenisSurats as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->nama_surat }}</td>
                    <td>{{ $surat->kategori_surat }}</td>
                    <td>{{ $surat->kode_surat }}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="showSurat({{ $surat->id }})" class="btn btn-primary">Show</a>
                        <a href="javascript:void(0)" onclick="editSurat({{ $surat->id }})" class="btn btn-primary">Edit</a>
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
                    <label for="kategori_surat">Kategori:</label>
                    <select name="kategori_surat" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Layanan Kependudukan">Layanan Kependudukan</option>
                        <option value="Layanan Catatan Sipil">Layanan Catatan Sipil</option>
                        <option value="Layanan Pernikahan">Layanan Pernikahan</option>
                        <option value="Layanan Umum">Layanan Umum</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_surat">Nama Surat:</label>
                    <input type="text" name="nama_surat" required>
                </div>

                <div class="form-group">
                    <label for="kode_surat">Kode Surat:</label>
                    <select name="kode_surat" required>
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

                <div class="button-container">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Edit Jenis Surat</div>
                <button class="close" onclick="closeEditModal()">×</button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="edit_kategori_surat">Kategori:</label>
                    <select name="kategori_surat" id="edit_kategori_surat" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Layanan Kependudukan">Layanan Kependudukan</option>
                        <option value="Layanan Catatan Sipil">Layanan Catatan Sipil</option>
                        <option value="Layanan Pernikahan">Layanan Pernikahan</option>
                        <option value="Layanan Umum">Layanan Umum</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="edit_nama_surat">Nama Surat:</label>
                    <input type="text" name="nama_surat" id="edit_nama_surat" required>
                </div>

                <div class="form-group">
                    <label for="edit_kode_surat">Kode Surat:</label>
                    <select name="kode_surat" id="edit_kode_surat" required>
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

                <div class="button-container">
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
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

    <!-- Modal show preview surat -->
    <div id="modalSurat" style="
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    ">
        <div style="
            background: #fff;
            padding: 20px;
            width: 900px;
            max-height: 90%;
            overflow: auto;
            border-radius: 8px;
            position: relative;
        ">
            <button onclick="closeShowModal()" style="
                position: absolute;
                top: 10px; right: 10px;
                background: #c00;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
            ">Tutup</button>
            <div id="modalContent"></div>
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

    function editSurat(id) {
        fetch(`/kelola-surat/edit/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_kategori_surat').value = data.kategori_surat;
                document.getElementById('edit_nama_surat').value = data.nama_surat;
                document.getElementById('edit_kode_surat').value = data.kode_surat;

                const form = document.getElementById('editForm');
                form.action = `/kelola-surat/update/${id}`;

                document.getElementById('editModal').classList.add('show');
                document.body.style.overflow = 'hidden';
            });
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.remove('show');
        document.body.style.overflow = 'auto';
        document.getElementById('editForm').reset();
    }
</script>

<script>
    function showSurat(id) {
        fetch('/kelola-surat/show/' + id)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalContent').innerHTML = data.html;
                document.getElementById('modalSurat').style.display = 'flex';
            });
    }

    function closeShowModal() {
        document.getElementById('modalSurat').style.display = 'none';
        document.getElementById('modalContent').innerHTML = ''; // clear content
    }
</script>
