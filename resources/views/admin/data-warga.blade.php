@extends('layout.admin.app')
@section('title', 'Data Warga Desa Rawapanjang')
@section('content')
<h4>Lihat Data Warga</h4>

<h2>Data Warga Desa Rawapanjang</h2>
<div class="main-container">
    @role('admin')
    <button class="add-button" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        Tambah Data
    </button>
    @endrole

    <!-- Modal -->
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Tambah Data Warga
                </div>
                <button class="close" onclick="closeModal()">×</button>
            </div>

            <form id="tambahForm" action="/tambah-warga" method="POST">
                @csrf
                <div class="form-group">
                    <label>NIK:</label>
                    <input type="text" id="nik" minlength="16" maxlength="16" name="nik" required placeholder="Masukkan NIK">
                </div>

                <div class="form-group">
                    <label>PIN:</label>
                    <input type="number" minlength="6" maxlength="6 id="pin" name="pin" required placeholder="Masukkan PIN">
                </div>

                <div class="form-group">
                    <label>Nama Warga:</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label>Pekerjaan:</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" required placeholder="Masukkan pekerjaan">
                </div>

                <div class="form-group">
                    <label>Tempat Lahir:</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" required placeholder="Masukkan tempat lahir">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label>Usia:</label>
                    <input type="number" id="usia" name="usia" required placeholder="Masukkan usia"">
                </div>

                <div class=" form-group">
                    <label>Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Agama:</label>
                    <select id="agama" name="agama" required>
                        <option value="">Pilih agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea id="alamat" name="alamat" required placeholder="Masukkan alamat lengkap"></textarea>
                </div>

                <div class="form-group">
                    <label>RT:</label>
                    <input type="text" id="rt" name="rt" required placeholder="RT">
                </div>
                <div class="form-group">
                    <label>RW:</label>
                    <input type="text" id="rw" name="rw" required placeholder="RW">
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

    <!-- Edit modal -->
    <!-- Modal Edit -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Edit Data Warga
                </div>
                <button class="close" onclick="closeEditModal()">×</button>
            </div>

            <form id="editForm" action="/update-warga" method="POST">
                @csrf
                <input type="hidden" id="id_warga" name="id_warga">

                <div class="form-group">
                    <label>NIK:</label>
                    <input type="text" id="nik_edit" minlength="16" maxlength="16" name="nik" required placeholder="Masukkan NIK">
                </div>

                <div class="form-group">
                    <label>PIN:</label>
                    <input type="number" minlength="6" maxlength="6" id="pin_edit" name="pin" required placeholder="Masukkan PIN">
                </div>

                <div class="form-group">
                    <label>Nama Warga:</label>
                    <input type="text" id="nama_edit" name="nama" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label>Pekerjaan:</label>
                    <input type="text" id="pekerjaan_edit" name="pekerjaan" required placeholder="Masukkan pekerjaan">
                </div>

                <div class="form-group">
                    <label>Tempat Lahir:</label>
                    <input type="text" id="tempat_lahir_edit" name="tempat_lahir" required placeholder="Masukkan tempat lahir">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir_edit" name="tanggal_lahir" required>
                </div>

                <div class="form-group">
                    <label>Usia:</label>
                    <input type="number" id="usia_edit" name="usia" required placeholder="Masukkan usia">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin:</label>
                    <select id="jenis_kelamin_edit" name="jenis_kelamin" required>
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Agama:</label>
                    <select id="agama_edit" name="agama" required>
                        <option value="">Pilih agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea id="alamat_edit" name="alamat" required placeholder="Masukkan alamat lengkap"></textarea>
                </div>

                <div class="form-group">
                    <label>RT:</label>
                    <input type="text" id="rt_edit" name="rt" required placeholder="RT">
                </div>

                <div class="form-group">
                    <label>RW:</label>
                    <input type="text" id="rw_edit" name="rw" required placeholder="RW">
                </div>

                <div class="button-container">
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Kembali</button>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20,6 9,17 4,12"></polyline>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                @role('admin')
                <th>Aksi</th>
                @endrole
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>RT</th>
                <th>RW</th>
                <th>Tempat Lahir</th>
                <th width="150px">Tanggal Lahir</th>
                <th>Agama</th>
                <th width="150px">Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_warga as $warga)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @role('admin')
                <td>
                    <button class="aksi" data-id="{{ $warga->id }}">Kelola Data</button>
                </td>
                @endrole
                <td>{{ $warga->nik }}</td>
                <td>{{ $warga->nama_lengkap }}</td>
                <td>{{ $warga->alamat }}</td>
                <td>{{ $warga->rt }}</td>
                <td>{{ $warga->rw }}</td>
                <td>{{ $warga->tempat_lahir }}</td>
                <td>{{ $warga->tanggal_lahir }}</td>
                <td>{{ $warga->agama }}</td>
                <td>{{ $warga->jenis_kelamin }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


{{ $data_warga->links() }}

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

    function openEditModal(warga) {
        document.getElementById('editModal').classList.add('show');
        document.body.style.overflow = 'hidden';
        // Isi form dengan data warga
        document.getElementById('id_warga').value = warga.id;
        document.getElementById('nik_edit').value = warga.nik;
        document.getElementById('pin_edit').value = warga.pin || "";
        document.getElementById('nama_edit').value = warga.nama_lengkap;
        document.getElementById('pekerjaan_edit').value = warga.pekerjaan;
        document.getElementById('tempat_lahir_edit').value = warga.tempat_lahir;
        document.getElementById('tanggal_lahir_edit').value = warga.tanggal_lahir;
        document.getElementById('usia_edit').value = warga.usia;
        document.getElementById('jenis_kelamin_edit').value = warga.jenis_kelamin;
        document.getElementById('agama_edit').value = warga.agama;
        document.getElementById('alamat_edit').value = warga.alamat;
        document.getElementById('rt_edit').value = warga.rt;
        document.getElementById('rw_edit').value = warga.rw;
    }

    // Fungsi untuk menutup modal edit
    function closeEditModal() {
        document.getElementById('editModal').classList.remove('show');
        document.body.style.overflow = 'auto';
        document.getElementById('editForm').reset();
    }

    // Event listener untuk tombol "Kelola Data"
    document.querySelectorAll('.aksi').forEach(button => {
        button.addEventListener('click', function() {
            const wargaId = this.getAttribute('data-id'); // Ambil ID warga dari atribut data-id
            fetch(`/show-warga/${wargaId}`)
                .then(response => response.json())
                .then(data => {
                    openEditModal(data);
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    });

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });

    // Handle escape key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEditModal();
        }
    });
</script>
@endsection