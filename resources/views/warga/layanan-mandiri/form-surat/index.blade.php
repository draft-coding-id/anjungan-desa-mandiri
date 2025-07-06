<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Surat {{$jenisSurat->nama}}</title>
    <link rel="icon" href="assets/logo.png" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
</head>

<body>
    <div class="header">
        <h2>{{$jenisSurat->nama}}</h2>
        <h3>Silahkan isi data anda</h3>
    </div>

    <div class="form-container">
        <div class="form-wrapper">
            @if(session('error'))
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <strong>Error:</strong> {{ session('error') }}
            </div>
            @endif

            <div class="info-box">
                <h4>Informasi</h4>
                <p>Silakan lengkapi data berikut untuk pembuatan {{ $jenisSurat->nama }}</p>
            </div>

            <form method="POST" action="{{ route('submitForm', $jenisSurat->kode) }}" enctype="multipart/form-data">
                @csrf

                <!-- Data Pemohon -->
                <input type="hidden" name="warga_id" value="{{ $warga->id }}">
                <input type="hidden" name="jenis_surat" value="{{ $jenisSurat->kode }}">
                <h3 class="section-title">Data Pemohon</h3>
                <table class="form-table">
                    @foreach($formFields->where('formFieldTemplate.category', 'Pemohon') as $field)
                    @include('layout.warga.form-field', ['field' => $field])
                    @endforeach
                </table>

                <!-- Data Tambahan -->
                @if($formFields->where('formFieldTemplate.category', 'Tambahan')->count())
                <h3 class="section-title">Data Tambahan</h3>
                <table class="form-table">
                    @foreach($formFields->where('formFieldTemplate.category', 'Tambahan') as $field)
                    @include('layout.warga.form-field', ['field' => $field])
                    @endforeach
                </table>
                @endif

                <!-- Data Target -->
                @if($formFields->where('formFieldTemplate.category', 'Target')->count())
                <h3 class="section-title">Data Terkait</h3>
                <table class="form-table">
                    @foreach($formFields->where('formFieldTemplate.category', 'Target') as $field)
                    @include('layout.warga.form-field', ['field' => $field])
                    @endforeach
                </table>
                @endif

                <!-- Dokumen & Informasi -->
                <h3 class="section-title">Dokumen dan Informasi</h3>
                <table class="form-table">
                    @foreach($formFields->where('formFieldTemplate.category', 'Wajib') as $field)
                    @include('layout.warga.form-field', ['field' => $field])
                    @endforeach
                </table>

                <div class="button-container">
                    <a href="{{ route('layanan-umum') }}" class="button secondary">Kembali</a>

                    <button type="submit" class="button">Kirim Permohonan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menambah baris repeater
            document.querySelectorAll('.add-row').forEach(button => {
                button.addEventListener('click', function() {
                    const repeaterId = this.getAttribute('data-repeater');
                    const container = document.querySelector(`#${repeaterId} .repeater-group`);
                    const firstGroup = container.querySelector('.repeater-row');
                    const newGroup = firstGroup.cloneNode(true);

                    // Reset nilai input
                    newGroup.querySelectorAll('input, select').forEach(input => {
                        input.value = '';
                        if (input.name) {
                            // Update index
                            const newIndex = container.children.length;
                            input.name = input.name.replace(/\[\d+\]/, `[${newIndex}]`);
                        }
                    });

                    // Tambahkan tombol hapus jika belum ada
                    if (!newGroup.querySelector('.remove-row')) {
                        const removeBtn = document.createElement('div');
                        removeBtn.className = 'col-auto';
                        removeBtn.innerHTML = '<button type="button" class="btn btn-danger remove-row">×</button>';
                        newGroup.appendChild(removeBtn);
                    }

                    container.appendChild(newGroup);
                });
            });

            // Fungsi untuk menghapus baris repeater
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-row')) {
                    const row = e.target.closest('.repeater-row');
                    if (row && row.parentElement.children.length > 1) {
                        row.remove();
                    }
                }
            });
        });
    </script>
</body>

</html>