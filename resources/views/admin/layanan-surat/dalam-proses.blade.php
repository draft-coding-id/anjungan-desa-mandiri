@extends('layout.admin.app')
@section('title', 'Layanan Surat')

@section('content')
<h4>Layanan Surat > Dalam Proses</h4>

@include('layout.admin.menu_surat')
<h4>Data Layanan Surat</h4>
<div class="content">
    @hasanyrole('admin|rt')
    <div class="mt-4">
        <h3>Proses Surat</h3>
        <table class="table">
            <thead>
                <tr>
                    <!-- NIK , Nama penduduk , RT , RW , No HP , Jenis Surat , Keperluan / Catata , dokumen verifikasi , aksi , countdown -->
                    <th>No.</th>
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Keperluan / Catatan</th>
                    <th>Dokumen Verifikasi</th>
                    <th width="150px">Aksi</th>
                    <th>Countdown</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dalamProses as $surat)
                <tr>
                    <td>{{$increment++}}</td>

                    <!-- <td>12345</td> -->
                    <td>{{$surat->isi_surat['nik']}}</td>
                    <td>{{$surat->isi_surat['nama_lengkap']}}</td>
                    <td>{{$surat->isi_surat['rt']}}</td>
                    <td>{{$surat->isi_surat['rw']}}</td>
                    <td>{{$surat->no_hp}}</td>
                    <td>{{$surat->jenis_surat}}</td>
                    <td>{{$surat->isi_surat['keperluan']}}</td>

                    <td height="50px" width="250px">
                        <button id="preview-dokumen-{{$surat->id}}" class="button" onclick="previewDokumen({{$surat->id}})">
                            Lihat Dokumen
                        </button>
                    </td>
                    <td height="50px" width="250px">
                        <button class="setuju-button" onclick="setujuiSurat({{$surat->id}})">Setujui</button>
                        <button class="tolak-button" onclick="tolakSurat({{$surat->id}})">Tolak</button>
                    </td>
                    <td class="countdown" data-endtime="{{ \Carbon\Carbon::parse($surat->created_at)->addMinutes(10)->timestamp }}">
                        <span class="countdown-display">00:00</span>
                    </td>
                    @empty
                    <td colspan="12" style="text-align: center">Surat Sudah di kirim ke warga</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endhasanyrole


    @hasanyrole('admin|kades|rw')
    <div class="mt-4">
        <h3>Kabari Warga</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th width="150px">Aksi</th>
                    <!-- <th>No. Antrean</th> -->
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $belumDikirimKeWarga as $surat)
                <tr>
                    <td>{{$incrementForTableBelumDiserahkan++}}</td>
                    @hasanyrole('kades|rw')
                    <td width="250px" height="50px">
                        <button class="button">{{$surat->status}}</button>
                    </td>
                    @endhasanyrole
                    @hasanyrole('admin|rt')
                    <td width="250px" height="50px">
                        <a href="{{route('layanan-surat-dalam-proses-surat-selesai' , $surat->id)}}" class="button" ;">Kabari warga
                        </a>
                    </td>
                    @endhasanyrole

                    <td>{{$surat->warga->nik}}</td>
                    <td>{{$surat->warga->nik}}</td>
                    <td>{{$surat->no_hp}}</td>
                    <td>{{$surat->jenis_surat}}</td>
                    <td>{{date($surat->created_at)}}</td>
                    @empty
                    <td colspan="7" style="text-align: center">Surat Sudah di kirim ke warga</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endhasanyrole
</div>
<script>
    function startCountdown() {
        const countdownElements = document.querySelectorAll('.countdown');

        countdownElements.forEach((el) => {
            const endTime = parseInt(el.getAttribute('data-endtime')) * 1000;
            const display = el.querySelector('.countdown-display');

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    display.textContent = '00:00';
                    return;
                }

                const minutes = Math.floor(distance / 60000);
                const seconds = Math.floor((distance % 60000) / 1000);
                display.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }

            updateCountdown(); // Run once immediately
            setInterval(updateCountdown, 1000); // Update every second
        });
    }
    document.addEventListener('DOMContentLoaded', startCountdown);
    async function getData(id) {
        const res = await fetch(`lihat-surat/${id}`).then(res => res.json());
        return res;
    }
    async function getData(id) {
        const res = await fetch(`lihat-surat/${id}`).then(res => res.json());
        return res;
    }
    async function previewDokumen(id) {
        const res = await fetch(`preview-dokumen/${id}`).then(res => res.json());
        console.log(res);
        showPreviewModal(res);
    }

    function showPreviewModal(data) {
        const modal = document.createElement('div');
        modal.className = 'preview-container';

        // Template dasar untuk modal
        modal.innerHTML = `
        <div class="preview-content">
            <div class="preview-header">
                <h3>Preview Dokumen ${data.file}</h3>
                <button onclick="closePreview(this)" class="close-button">&times;</button>
            </div>
            <div class="preview-body">
                <iframe 
                    id="preview-frame"
                    src="${data.file}"
                    width="100%"
                    height="820px"
                    frameborder="0"
                    style="border: 1px solid #ddd; border-radius: 4px;"
                >
                </iframe>
            </div>
        </div>
    `;
        document.body.appendChild(modal);
    }

    function closePreview(element) {
        element.closest('.preview-container').remove();
    }

    async function setujuiSurat(id) {
        // Ambil data surat dari server
        const data = await getData(id);

        const modal = document.createElement('div');
        modal.className = 'approval-modal';
        modal.innerHTML = `
            <div class="approval-content">
                <h2>Setujui pengajuan surat?</h2>
                
                <div class="surat-info">
                    <div class="info-row">
                        <span class="info-label">NIK</span>
                        <span class="info-value">: ${data.isi_surat['nik']}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Nama Warga</span>
                        <span class="info-value">: ${data.isi_surat['nama_lengkap']}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Jenis Surat</span>
                        <span class="info-value">: ${data.jenis_surat}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Catatan</span>
                        <span class="info-value">: ${data.isi_surat['keperluan'] || "Tidak ada catatan"}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Dokumen Verifikasi</span>
                        <span class="info-value">:</span>
                    </div>
                </div>

                <div class="preview-section">
                    <div class="preview-box">
                             <iframe 
                                id="preview-frame"
                                src="/preview-surat/${data.jenis_surat}/${data.id}"
                                width="100%"
                                height="500px"
                                frameborder="0"
                                style="border: 1px solid #ddd; border-radius: 4px;"
                            >
                            </iframe>
                    </div>
                </div>

                <div class="confirmation-text">
                    Setelah diproses, surat akan diserahkan kepada warga.
                </div>
                <form action="/surat-disetujui/${id}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="">
                    <div class="button-group">
                        <button type="button" class="btn btn-secondary" onclick="closeApprovalModal(this)">Kembali</button>
                        <button type="submit" class="btn btn-primary" >Setujui</button>
                    </div>
                </form>

            </div>
        `;

        document.body.appendChild(modal);
    }

    function closeApprovalModal(element) {
        element.closest('.approval-modal').remove();
    }

    async function tolakSurat(id) {
        const data = await getData(id);

        const modal = document.createElement('div');
        modal.className = 'penolakan-modal';
        modal.innerHTML = `
        <div class="penolakan-content">
            <h2>Tolak pengajuan surat?</h2>
            
            <div class="surat-info">
                <div class="info-row">
                    <span class="info-label">NIK</span>
                    <span class="info-value">: ${data.isi_surat['nik']}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Nama Warga</span>
                    <span class="info-value">: ${data.isi_surat['nama_lengkap']}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Jenis Surat</span>
                    <span class="info-value">: ${data.jenis_surat}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Catatan</span>
                    <span class="info-value">: ${data.isi_surat['keperluan']}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Dokumen Verifikasi</span>
                    <span class="info-value">:</span>
                </div>
            </div>

            <div class="preview-section">
                <div class="preview-box">
                            <iframe 
                                id="preview-frame"
                                src="/preview-surat/${data.jenis_surat}/${data.id}"
                                width="100%"
                                height="500px"
                                frameborder="0"
                                style="border: 1px solid #ddd; border-radius: 4px;"
                            >
                            </iframe>
                </div>
            </div>
            <form action="/surat-ditolak/${id}" method="POST">
            @csrf
            <div class="warning-text">
                ⚠️ Penolakan akan dikirim ke pemohon beserta alasan yang diberikan.
            </div>
                        <div class="alasan-penolakan">
                <label for="alasan-tolak">Alasan Penolakan <span style="color: #dc3545;">*</span></label>
                <textarea 
                    id="alasan-tolak" 
                    name="alasan"
                    placeholder="Masukkan alasan penolakan yang jelas dan konstruktif..."
                    maxlength="500"
                    oninput="updateCharCount(this)"
                ></textarea>
                <div class="char-count">
                    <span id="char-count">0</span>/500 karakter
                </div>
            </div>
            <div class="button-group">
                <button type="button" class="btn btn-secondary" onclick="closePenolakanModal(this)">Kembali</button>
                <button type="submit"class="btn btn-danger" id="btn-tolak" disabled>Tolak Surat</button>
            </div>
            </form>

        </div>
    `;

        document.body.appendChild(modal);
    }

    function updateCharCount(textarea) {
        const charCount = document.getElementById('char-count');
        const btnTolak = document.getElementById('btn-tolak');
        const currentLength = textarea.value.length;

        charCount.textContent = currentLength;

        // Enable/disable button based on input
        if (currentLength >= 10) {
            btnTolak.disabled = false;
        } else {
            btnTolak.disabled = true;
        }
    }

    function closePenolakanModal(element) {
        element.closest('.penolakan-modal').remove();
    }

    async function prosesPenolakan(id) {
        const alasan = document.getElementById('alasan-tolak').value.trim();

        if (alasan.length < 10) {
            alert('Alasan penolakan harus minimal 10 karakter!');
            return;
        }

        if (confirm('Apakah Anda yakin ingin menolak surat ini?')) {
            try {
                // Kirim request ke server untuk menolak surat
                const response = await fetch(`/surat-ditolak/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        alasan: alasan
                    })
                });
                console.log(response);
                if (response.ok) {
                    alert('Surat berhasil ditolak!');
                    document.querySelector('.penolakan-modal').remove();
                    location.reload();
                } else {
                    alert('Gagal menolak surat!');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses penolakan!');
            }
        }
    }
</script>
@endsection