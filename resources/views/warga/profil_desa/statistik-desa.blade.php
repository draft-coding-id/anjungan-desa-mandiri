@extends('layout.warga.tentang-desa-layout')

@section('content')
<div class="container">
    <div class="main-title">Statistik Desa Rawapanjang</div>

    <div class="section">
        <div class="section-title">📊 Pilih Kategori Statistik</div>
        <div class="list-container">
            <select id="chartSelector" style="width: 100%; padding: 12px; border: 2px solid #ff9900; border-radius: 8px; font-size: 16px; background: white;">
                <option value="jenis_kelamin">Jenis Kelamin</option>
                <option value="kategori_usia">Kategori Usia</option>
                <option value="rentang_usia">Rentang Usia</option>
                <option value="agama">Agama</option>
                <option value="pekerjaan">Pekerjaan</option>
                <option value="kecamatan">Kecamatan</option>
            </select>
        </div>
    </div>

    <div class="section">
        <div class="section-title">📈 Grafik Statistik</div>
        <div class="list-container" style="padding: 30px; text-align: center;">
            <canvas id="statistikChart" width="400" height="400"></canvas>
        </div>
    </div>

    <div class="section">
        <div class="section-title">📋 Detail Statistik</div>
        <div id="statistikDetail" class="stats-grid">
            <!-- Detail akan dimuat di sini -->
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('layout.warga.tentang-desa-navbar')
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('statistikChart').getContext('2d');
        let chart = null;

        // Warna-warna yang menarik untuk pie chart
        const colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
            '#9966FF', '#FF9F40', '#FF6384', '#C9CBCF',
            '#4BC0C0', '#FF6384', '#36A2EB', '#FFCE56'
        ];

        // Fungsi untuk mengambil data statistik
        async function fetchStatistik(kategori) {
            try {
                const response = await fetch(`/statistik/${kategori}`);
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Error fetching data:', error);
                return [];
            }
        }

        // Fungsi untuk membuat/update chart
        function createChart(data, label) {
            // Hapus chart sebelumnya jika ada
            if (chart) {
                chart.destroy();
            }

            const labels = data.map(item => item.label);
            const values = data.map(item => item.count);
            const backgroundColors = colors.slice(0, data.length);

            chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: values,
                        backgroundColor: backgroundColors,
                        borderColor: '#ffffff',
                        borderWidth: 3,
                        hoverBorderWidth: 5,
                        hoverBorderColor: '#ff9900'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                color: '#333'
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#ff9900',
                            borderWidth: 2,
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return `${context.label}: ${context.parsed} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true,
                        duration: 1000
                    }
                }
            });
        }

        // Fungsi untuk menampilkan detail statistik
        function displayDetail(data, kategori) {
            const detailContainer = document.getElementById('statistikDetail');
            const total = data.reduce((sum, item) => sum + item.count, 0);

            let detailHTML = '';
            data.forEach((item, index) => {
                const percentage = ((item.count / total) * 100).toFixed(1);
                const color = colors[index % colors.length];

                detailHTML += `
                <div class="stat-card" style="background: linear-gradient(135deg, ${color}, ${color}dd);">
                    <div class="stat-number">${item.count}</div>
                    <div class="stat-label">${item.label}</div>
                    <div style="font-size: 12px; opacity: 0.9; margin-top: 5px;">${percentage}%</div>
                </div>
            `;
            });

            // Tambahkan card total
            detailHTML += `
            <div class="stat-card" style="background: linear-gradient(135deg, #ff9900, #e68a00);">
                <div class="stat-number">${total}</div>
                <div class="stat-label">Total Warga</div>
                <div style="font-size: 12px; opacity: 0.9; margin-top: 5px;">100%</div>
            </div>
        `;

            detailContainer.innerHTML = detailHTML;
        }

        // Event listener untuk perubahan kategori
        document.getElementById('chartSelector').addEventListener('change', async function() {
            const kategori = this.value;
            const data = await fetchStatistik(kategori);

            if (data && data.length > 0) {
                const labels = {
                    'jenis_kelamin': 'Distribusi Jenis Kelamin',
                    'kategori_usia': 'Distribusi Kategori Usia',
                    'agama': 'Distribusi Agama',
                    'pekerjaan': 'Distribusi Pekerjaan',
                    'kecamatan': 'Distribusi Kecamatan'
                };

                createChart(data, labels[kategori]);
                displayDetail(data, kategori);
            }
        });

        // Load data awal (jenis kelamin)
        fetchStatistik('jenis_kelamin').then(data => {
            if (data && data.length > 0) {
                createChart(data, 'Distribusi Jenis Kelamin');
                displayDetail(data, 'jenis_kelamin');
            }
        });
    });
</script>
@endpush