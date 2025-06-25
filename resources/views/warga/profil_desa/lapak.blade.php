@extends('layout.warga.app')
@section('title' , 'Lapak')
@section('header' , 'Lapak')
@section('content')
<div class="lapak-container">
    @forelse ($lapaks as $lapak)
    <div class="lapak-card">
        <div class="lapak-image-placeholder">
            @if($lapak->gambar && \Illuminate\Support\Facades\Storage::disk('public')->exists($lapak->gambar))
            <img class="lapak-image" src="{{ asset('storage/'.$lapak->gambar) }}" alt="Gambar Lapak" />
            @else
            <div class="no-image-placeholder">
                <span>📦</span>
                <p>Tidak ada gambar</p>
            </div>
            @endif
        </div>

        <div class="lapak-card-content">
            <div class="lapak-card-header">
                <h3 class="lapak-nama">{{ $lapak->nama }}</h3>
                <span class="lapak-kategori">{{ $lapak->kategori }}</span>
            </div>

            <p class="lapak-deskripsi">
                {{ \Illuminate\Support\Str::limit($lapak->deskripsi, 75, '...') }}
            </p>

            <div class="lapak-harga">
                Rp {{ number_format($lapak->harga, 0, ',', '.') }}
            </div>

            <div class="lapak-actions">
                <button class="lapak-btn lapak-btn-detail" onclick="getDetail({{ $lapak->id }})">
                    <span>📋</span> Detail
                </button>

                @if($lapak->link_gmaps)
                <a href="{{ $lapak->link_gmaps }}"
                    target="_blank"
                    class="lapak-btn lapak-btn-primary">
                    <span>📍</span> Lokasi
                </a>
                @endif

                @if($lapak->no_hp)
                <a href="https://wa.me/+62{{ $lapak->no_hp }}"
                    target="_blank"
                    class="lapak-btn lapak-btn-secondary">
                    <span>💬</span> WhatsApp
                </a>
                @endif
            </div>

            @if($lapak->warga)
            <div class="lapak-owner">
                <div class="lapak-owner-icon">👤</div>
                <span>{{ $lapak->warga->nama_lengkap ?? 'Penjual' }}</span>
            </div>
            @endif
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div class="empty-state-icon">🏪</div>
        <h2>Belum Ada Lapak</h2>
        <p>Saat ini belum ada lapak yang terdaftar. Silakan cek kembali nanti!</p>
    </div>
    @endforelse
</div>

@section('back-button')
<div class="button-container">
    <a href="{{route('halaman_utama')}}" class="button">
        <span>⬅️</span> Kembali
    </a>
</div>
@endsection
<script>
    async function getDetail(id) {
        try {
            let response = await fetch(`/lapak-warga/detail/${id}`);
            let data = await response.json();

            if (response.ok) {
                openModal(data);
            } else {
                console.error('Error:', data.error);
                alert('Gagal memuat detail lapak');
            }
        } catch (error) {
            console.error('Fetch error:', error);
            alert('Terjadi kesalahan saat memuat data');
        }
    }

    function openModal(lapak) {
        // Remove existing modal if any
        const existingModal = document.getElementById('lapakModal');
        if (existingModal) {
            existingModal.remove();
        }

        // Format harga
        const formattedPrice = new Intl.NumberFormat('id-ID').format(lapak.harga);

        // Prepare image content
        const imageContent = lapak.gambar ?
            `<img class="modal-image" src="/storage/${lapak.gambar}" alt="${lapak.nama}" />` :
            `<div class="modal-no-image">
                <span>📦</span>
                <p>Tidak ada gambar</p>
            </div>`;

        // Prepare action buttons
        let actionButtons = '';

        if (lapak.link_gmaps) {
            actionButtons += `
                <a href="${lapak.link_gmaps}" target="_blank" class="modal-btn modal-btn-primary">
                    <span>📍</span> Lihat Lokasi
                </a>
            `;
        }

        if (lapak.no_hp) {
            const cleanedPhone = lapak.no_hp.replace(/[^0-9]/g, '');
            actionButtons += `
                <a href="https://wa.me/${cleanedPhone}" target="_blank" class="modal-btn modal-btn-secondary">
                    <span>💬</span> Hubungi WhatsApp
                </a>
            `;
        }

        // Create modal HTML
        const modalHTML = `
            <div class="modal" id="lapakModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>${lapak.nama}</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        ${imageContent}
                        
                        <div class="modal-info">
                            <div class="modal-info-item">
                                <div class="modal-info-label">Kategori</div>
                                <div class="modal-info-value kategori">${lapak.kategori}</div>
                            </div>
                            
                            <div class="modal-info-item">
                                <div class="modal-info-label">Deskripsi</div>
                                <div class="modal-info-value">${lapak.deskripsi}</div>
                            </div>
                            
                            <div class="modal-info-item">
                                <div class="modal-info-label">Harga</div>
                                <div class="modal-info-value price">Rp ${formattedPrice}</div>
                            </div>
                        </div>

                        ${lapak.warga ? `
                            <div class="modal-owner">
                                <div class="modal-owner-icon">👤</div>
                                <span>Dijual oleh: ${lapak.warga.nama_lengkap}</span>
                            </div>
                        ` : ''}

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
        const modal = document.getElementById('lapakModal');
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
                const modal = document.getElementById('lapakModal');
                if (modal) {
                    modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
                    setTimeout(() => modal.remove(), 300);
                }
            }
        });
    }

    // Fungsi untuk menutup modal secara manual
    function closeModal() {
        const modal = document.getElementById('lapakModal');
        if (modal) {
            modal.style.animation = 'modalFadeIn 0.3s ease-out reverse';
            setTimeout(() => modal.remove(), 300);
        }
    }
</script>
@endsection