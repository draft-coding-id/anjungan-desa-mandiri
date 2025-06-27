@extends('layout.warga.tentang-desa-layout')
@section('title' , 'Tentang Desa | Kabar Pembangunan')
@section('header' , 'Tentang Desa | Kabar Pembangunan')
@section('content')
<div class="pembangunan-container">
    @forelse ($pembangunans as $pembangunan)
    <div class="pembangunan-card">
        <div class="pembangunan-image-placeholder">
            @if($pembangunan->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($pembangunan->foto))
            <img class="pembangunan-image" src="{{ asset('storage/'.$pembangunan->foto) }}" alt="Foto Pembangunan" />
            @else
            <div class="no-image-placeholder">
                <span>🏗️</span>
                <p>Tidak ada foto</p>
            </div>
            @endif
        </div>

        <div class="pembangunan-card-content">
            <div class="pembangunan-card-header">
                <h3 class="pembangunan-nama">{{ $pembangunan->nama }}</h3>
                <span class="pembangunan-tahun">{{ $pembangunan->tahun }}</span>
            </div>

            <div class="pembangunan-anggaran">
                Rp {{ number_format($pembangunan->anggaran, 0, ',', '.') }}
            </div>

            <div class="pembangunan-lokasi">
                <span class="lokasi-icon">📍</span>
                {{ \Illuminate\Support\Str::limit($pembangunan->lokasi, 50, '...') }}
            </div>

            <div class="pembangunan-actions">
                <button class="pembangunan-btn pembangunan-btn-detail" onclick="getDetail({{ $pembangunan->id }})">
                    <span>📋</span> Detail
                </button>

                @if($pembangunan->link_gmaps)
                <a href="{{ $pembangunan->link_gmaps }}" target="_blank" class="pembangunan-btn pembangunan-btn-primary">
                    <span>📍</span> Lokasi
                </a>
                @endif
            </div>

            <div class="pembangunan-meta">
                <div class="pembangunan-sumber">
                    <span class="meta-icon">💰</span>
                    <span>{{ $pembangunan->sumber_dana }}</span>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div class="empty-state-icon">🏗️</div>
        <h2>Belum Ada Data Pembangunan</h2>
        <p>Saat ini belum ada data pembangunan yang terdaftar. Silakan cek kembali nanti!</p>
    </div>
    @endforelse
</div>
<script>
    async function getDetail(id) {
        try {
            let response = await fetch(`/kabar-pembangunan/detail/${id}`);
            let data = await response.json();

            if (response.ok) {
                openModal(data);
            } else {
                console.error('Error:', data.error);
                alert('Gagal memuat detail pembangunan');
            }
        } catch (error) {
            console.error('Fetch error:', error);
            alert('Terjadi kesalahan saat memuat data');
        }
    }

    function openModal(pembangunan) {
        // Remove existing modal if any
        const existingModal = document.getElementById('pembangunanModal');
        if (existingModal) {
            existingModal.remove();
        }

        // Format anggaran
        const formattedAnggaran = new Intl.NumberFormat('id-ID').format(pembangunan.anggaran);

        // Prepare image content
        const imageContent = pembangunan.foto ?
            `<img class="modal-image" src="/storage/${pembangunan.foto}" alt="${pembangunan.nama}" />` :
            `<div class="modal-no-image">
    <span>🏗️</span>
    <p>Tidak ada foto</p>
</div>`;

        // Prepare action buttons
        let actionButtons = '';
        if (pembangunan.link_gmaps) {
            actionButtons += `
<a href="${pembangunan.link_gmaps}" target="_blank" class="modal-btn modal-btn-primary">
    <span>📍</span> Lihat Lokasi di Maps
</a>
`;
        }

        // Create modal HTML
        const modalHTML = `
<div class="modal" id="pembangunanModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>${pembangunan.nama}</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            ${imageContent}

            <div class="modal-info">
                <div class="modal-info-item">
                    <div class="modal-info-label">Tahun</div>
                    <div class="modal-info-value tahun">${pembangunan.tahun}</div>
                </div>

                <div class="modal-info-item">
                    <div class="modal-info-label">Anggaran</div>
                    <div class="modal-info-value price">Rp ${formattedAnggaran}</div>
                </div>

                <div class="modal-info-item">
                    <div class="modal-info-label">Volume</div>
                    <div class="modal-info-value">${pembangunan.volume || 'Tidak tersedia'}</div>
                </div>

                <div class="modal-info-item">
                    <div class="modal-info-label">Sumber Dana</div>
                    <div class="modal-info-value">${pembangunan.sumber_dana}</div>
                </div>

                <div class="modal-info-item">
                    <div class="modal-info-label">Pelaksana</div>
                    <div class="modal-info-value">${pembangunan.pelaksana || 'Tidak tersedia'}</div>
                </div>

                <div class="modal-info-item">
                    <div class="modal-info-label">Lokasi</div>
                    <div class="modal-info-value">${pembangunan.lokasi}</div>
                </div>

                <div class="modal-info-item">
                    <div class="modal-info-label">Manfaat</div>
                    <div class="modal-info-value">${pembangunan.manfaat || 'Tidak tersedia'}</div>
                </div>

                ${pembangunan.keterangan ? `
                <div class="modal-info-item">
                    <div class="modal-info-label">Keterangan</div>
                    <div class="modal-info-value">${pembangunan.keterangan}</div>
                </div>
                ` : ''}
            </div>

            ${actionButtons ? `
            <div class="modal-actions">
                ${actionButtons}
            </div>
            ` : ''}
        </div>
    </div>
</div>
`;

        // Add modal to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);

        // Add event listeners
        const modal = document.getElementById('pembangunanModal');
        const closeBtn = modal.querySelector('.close');

        // Close modal when clicking close button
        closeBtn.onclick = function() {
            modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
            setTimeout(() => modal.remove(), 300);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
                setTimeout(() => modal.remove(), 300);
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('pembangunanModal');
                if (modal) {
                    modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
                    setTimeout(() => modal.remove(), 300);
                }
            }
        });
    }

    // Fungsi untuk menutup modal secara manual
    function closeModal() {
        const modal = document.getElementById('pembangunanModal');
        if (modal) {
            modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
            setTimeout(() => modal.remove(), 300);
        }
    }
</script>

@section('footer')
@include('layout.warga.tentang-desa-navbar')
@endsection
@endsection