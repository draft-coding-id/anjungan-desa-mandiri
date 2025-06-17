@extends('layout.admin.app')
@section('title', 'Pengaturan Hak Akses')
@section('content')
<h4>Pengaturan Hak Akses</h4>
<div class="main-container">


    <button class="add-button" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        Tambah User
    </button>
    <!-- Tambah Modal -->
    <div id="tambahModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Tambah Akun
                </div>
                <button class="close" onclick="closeModal()">×</button>
            </div>

            <form id="tambahForm" action="/tambah-akun" method="POST">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Masukkan username">
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" maxlength="6" required placeholder="Masukkan kata sandi">
                </div>

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Masukkan email">
                </div>

                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="tel" id="no_hp" name="no_hp" maxlength="15" required placeholder="Masukkan nomor HP">
                </div>

                <div class="form-group">
                    <label for="otorisasi">Otorisasi</label>
                    <select id="role" name="role" required>
                        <option value="">Pilih otorisasi</option>
                        <option value="admin">Admin</option>
                        <option value="kades">Kades</option>
                        <option value="rt">RT</option>
                        <option value="rw">RW</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="otorisasi">Akses</label>
                    <select name="akses" class="form-control" required>
                        <optgroup label="RW">
                            @for($dataRw = 1; $dataRw <= 10; $dataRw++)
                                <option value="RW {{ $dataRw }}">RW {{ $dataRw }}</option>
                                @endfor
                        </optgroup>

                        <optgroup label="RT - RW">
                            @for($dataRw = 1; $dataRw <= 10; $dataRw++)
                                @for($dataRt=1; $dataRt <=10; $dataRt++)
                                <option value="RT {{ $dataRt }} - RW {{ $dataRw }}">RT {{ $dataRt }} - RW {{ $dataRw }}</option>
                                @endfor
                                @endfor
                        </optgroup>
                    </select>
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
                <div class="modal-title">Edit Akun</div>
                <button class="close" onclick="closeEditModal()">×</button>
            </div>

            <!-- Form Edit -->
            <form id="editForm" action="/update-akun" method="POST">
                @csrf
                <input type="hidden" id="id" name="id">

                <div class="form-group">
                    <label for="username_edit">Username</label>
                    <input type="text" id="username_edit" name="username" required placeholder="Masukkan username">
                </div>

                <div class="form-group">
                    <label for="password_edit">Kata Sandi</label>
                    <input type="password" maxlength="6" id="password_edit" name="password"
                        placeholder="Kosongkan jika tidak diubah">
                </div>

                <div class="form-group">
                    <label for="name_edit">Nama Lengkap</label>
                    <input type="text" id="name_edit" name="name" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label for="email_edit">Email</label>
                    <input type="email" id="email_edit" name="email" required placeholder="Masukkan email">
                </div>

                <div class="form-group">
                    <label for="no_hp_edit">Nomor HP</label>
                    <input type="tel" id="no_hp_edit" name="no_hp" maxLength="15" required placeholder="Masukkan nomor HP">
                </div>

                <div class="form-group">
                    <label for="role_edit">Otorisasi</label>
                    <select id="role_edit" name="role" required>
                        <option value="">Pilih otorisasi</option>
                        <option value="admin">Admin</option>
                        <option value="kades">Kades</option>
                        <option value="rt">RT</option>
                        <option value="rw">RW</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="otorisasi">Akses</label>
                    <select name="akses" class="form-control" required>
                        <optgroup label="Admin">
                            @for($dataAdmin = 1; $dataAdmin <= 10; $dataAdmin++)
                                <option value="{{ $dataAdmin }}">Admin {{ $dataAdmin }}</option>
                                @endfor
                        </optgroup>
                        <optgroup label="Kades">
                            @for($dataKades = 1; $dataKades <= 10; $dataKades++)
                                <option value="{{ $dataKades }}">Kades {{ $dataKades }}</option>
                                @endfor
                        </optgroup>
                        <optgroup label="RW">
                            @for($dataRw = 1; $dataRw <= 10; $dataRw++)
                                <option value="RW {{ $dataRw }}">RW {{ $dataRw }}</option>
                                @endfor
                        </optgroup>

                        <optgroup label="RT - RW">
                            @for($dataRw = 1; $dataRw <= 10; $dataRw++)
                                @for($dataRt=1; $dataRt <=10; $dataRt++)
                                <option value="RT {{ $dataRt }} - RW {{ $dataRw }}">RT {{ $dataRt }} - RW {{ $dataRw }}</option>
                                @endfor
                                @endfor
                        </optgroup>
                    </select>
                </div>

                <div class="button-container">
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
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

    <h5 class="h5">
        Admin
    </h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Akses</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admin as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <button class="aksi" data-id="{{ $data->id }}">Edit</button>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_hp }}</td>
                <td>{{ $data->akses  }}</td>
                @empty
                <td colspan="7" style="text-align: center">Tidak ada akun dengan role admin</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            {{ $admin->links() }}
        </tfoot>
    </table>

    <h5 class="h5">
        Kepala Desa
    </h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Akses</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kades as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <button class="aksi" data-id="{{ $data->id }}">Edit</button>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_hp}}</td>
                <td>{{ $data->akses}}</td>
                @empty
                <td colspan="7" style="text-align: center">Tidak ada akun dengan role kades</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            {{ $kades->links() }}
        </tfoot>
    </table>
    <h5 class="h5">
        Rukun Warga - RW
    </h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Akses</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rw as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <button class="aksi" data-id="{{ $data->id }}">Edit</button>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_hp}}</td>
                <td>{{ $data->akses}}</td>
                @empty
                <td colspan="7" style="text-align: center">Tidak ada akun dengan role RW</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            {{ $rw->links() }}
        </tfoot>
    </table>
    <h5 class="h5">
        Rukun Tetangga - RT
    </h5>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Akses</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rt as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <button class="aksi" data-id="{{ $data->id }}">Edit</button>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_hp}}</td>
                <td>{{ $data->akses}}</td>
                @empty
                <td colspan="7" style="text-align: center">Tidak ada akun dengan role RT</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            {{ $rt->links() }}
        </tfoot>
    </table>
</div>



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

    function openEditModal(user) {
        document.getElementById('editModal').classList.add('show');
        document.body.style.overflow = 'hidden';

        // Isi form dengan data user
        document.getElementById('id').value = user.id;
        document.getElementById('username_edit').value = user.username;
        document.getElementById('password_edit').value = user.password; // Kosongkan kata sandi untuk keamanan
        document.getElementById('name_edit').value = user.name;
        document.getElementById('email_edit').value = user.email;
        document.getElementById('no_hp_edit').value = user.no_hp;
        document.getElementById('role_edit').value = user.role;
        document.getElementById('akses_edit').value = user.akses;
    }

    // Fungsi untuk menutup modal edit
    function closeEditModal() {
        document.getElementById('editModal').classList.remove('show');
        document.body.style.overflow = 'auto';
        document.getElementById('editForm').reset();
    }

    // Event listener untuk tombol "Edit"
    document.querySelectorAll('.aksi').forEach(button => {

        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-id'); // Ambil ID user dari atribut data-id
            fetch(`/show-akun/${userId}`)
                .then(response => response.json())
                .then(data => {
                    const user = data.user;
                    const userRole = data.roles; // jika hanya satu role

                    openEditModal({
                        ...user,
                        role: userRole
                    });
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