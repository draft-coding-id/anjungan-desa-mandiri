@extends('layout.admin.app')
@section('title', 'Layanan Surat')
@section('content')
<div class="path">
    <h4>Layanan Surat > Arsip Surat Ditolak</h4>
</div>
@include('layout.admin.menu_surat')
<h4>Data Surat Ditolak</h4>
<div class="content">
    <div class="mt-4">
        <h3>Arsip Surat Ditolak</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Petugas</th>
                    <th>No. Surat</th>
                    <th>Nama Penduduk</th>
                    <th>No. HP Aktif</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal Kirim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surat as $data )
                <tr>
                    <td>{{$increment}}</td>
                    <td><button onclick="setujuiSurat({{$data->id}})">{{$data->status}}</button>
                    </td>
                    <td></td>
                    <td>{{$data->no_surat}}</td>
                    <td>{{$data->isi_surat['nama_lengkap']}}</td>
                    <td>{{$data->no_hp}}</td>
                    <td>{{$data->jenis_surat}}</td>
                    <td>{{$data->created_at}}</td>
                </tr>
                @empty
                <td colspan="8" style="text-align: center">Belum ada surat yang ditolak saat ini</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    async function getData(id) {
        const res = await fetch(`lihat-surat/${id}`).then(res => res.json());
        return res;
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
</script>
@endsection