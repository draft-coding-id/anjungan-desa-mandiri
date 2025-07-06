<?php
namespace Database\Seeders;

use App\Models\FormFieldTemplate;
use Illuminate\Database\Seeder;

class FormFieldTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            // ============================================
            // DATA PEMOHON (READONLY, diambil dari database)
            // ============================================
            [
                'name' => 'nama_lengkap',
                'label' => 'Nama Lengkap',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true,
                    'maxlength' => 100
                ]
            ],
            [
                'name' => 'no_kk',
                'label' => 'Nomor KK',
                'type' => 'number',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true,
                    'maxlength' => 16
                ]
            ],
            [
                'name' => 'nik',
                'label' => 'NIK',
                'type' => 'number',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true,
                    'maxlength' => 16
                ]
            ],
            [
                'name' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'type' => 'date',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'agama',
                'label' => 'Agama',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'status_kawin',
                'label' => 'Status Perkawinan',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'pendidikan',
                'label' => 'Pendidikan',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'kewarganegaraan',
                'label' => 'Kewarganegaraan',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'alamat',
                'label' => 'Alamat',
                'type' => 'textarea',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true,
                    'rows' => 3
                ]
            ],
            [
                'name' => 'golongan_darah',
                'label' => 'Golongan Darah',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'rt',
                'label' => 'RT',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'rw',
                'label' => 'RW',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'kecamatan',
                'label' => 'Kecamatan',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],
            [
                'name' => 'desa',
                'label' => 'Desa',
                'type' => 'text',
                'category' => 'Pemohon',
                'is_required_default' => true,
                'attributes' => [
                    'readonly' => true
                ]
            ],

            // ============================================
            // DATA TAMBAHAN (Input manual oleh pemohon)
            // ============================================
            [
                'name' => 'mulai_berlaku',
                'label' => 'Mulai Berlaku',
                'type' => 'date',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'akhir_berlaku',
                'label' => 'Akhir Berlaku',
                'type' => 'date',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'nama_kepala_keluarga',
                'label' => 'Nama Kepala Keluarga',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 100
                ]
            ],
            [
                'name' => 'jumlah_keluarga_pindah',
                'label' => 'Jumlah Keluarga Pindah',
                'type' => 'number',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'min' => 1,
                    'max' => 20
                ]
            ],
            [
                'name' => 'alasan_kepindahan',
                'label' => 'Alasan Kepindahan',
                'type' => 'textarea',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'rows' => 3
                ]
            ],
            [
                'name' => 'tanggal_meninggal',
                'label' => 'Tanggal Meninggal',
                'type' => 'date',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'tempat_meninggal',
                'label' => 'Tempat Meninggal',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 100
                ]
            ],
            [
                'name' => 'hubungan_terkait',
                'label' => 'Hubungan dengan Yang Bersangkutan',
                'type' => 'select',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'options' => ['Anak', 'Suami', 'Istri', 'Ayah', 'Ibu', 'Saudara']
                ]
            ],

            // Data khusus surat cerai
            [
                'name' => 'nama_suami',
                'label' => 'Nama Suami',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 100
                ]
            ],
            [
                'name' => 'nik_suami',
                'label' => 'NIK Suami',
                'type' => 'number',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 16
                ]
            ],
            [
                'name' => 'ttl_suami',
                'label' => 'Tempat/Tgl Lahir Suami',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'placeholder' => 'Tempat, DD-MM-YYYY'
                ]
            ],
            [
                'name' => 'pekerjaan_suami',
                'label' => 'Pekerjaan Suami',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'agama_suami',
                'label' => 'Agama Suami',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'alamat_suami',
                'label' => 'Alamat Suami',
                'type' => 'textarea',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'rows' => 2
                ]
            ],
            [
                'name' => 'nama_istri',
                'label' => 'Nama Istri',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 100
                ]
            ],
            [
                'name' => 'nik_istri',
                'label' => 'NIK Istri',
                'type' => 'number',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 16
                ]
            ],
            [
                'name' => 'ttl_istri',
                'label' => 'Tempat/Tgl Lahir Istri',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'placeholder' => 'Tempat, DD-MM-YYYY'
                ]
            ],
            [
                'name' => 'pekerjaan_istri',
                'label' => 'Pekerjaan Istri',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'agama_istri',
                'label' => 'Agama Istri',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'alamat_istri',
                'label' => 'Alamat Istri',
                'type' => 'textarea',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'rows' => 2
                ]
            ],

            // Data khusus janda/duda
            [
                'name' => 'status_pernyataan',
                'label' => 'Status (Janda/Duda)',
                'type' => 'select',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'options' => ['Janda', 'Duda']
                ]
            ],

            // Data khusus keramaian
            [
                'name' => 'jenis_keramaian',
                'label' => 'Jenis Keramaian',
                'type' => 'text',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 100
                ]
            ],

            // Repeater untuk daftar keluarga pindah
            [
                'name' => 'list_keluarga_pindah',
                'label' => 'Daftar Keluarga yang Pindah',
                'type' => 'repeater',
                'category' => 'Tambahan',
                'is_required_default' => false,
                'attributes' => [
                    'fields' => [
                        [
                            'name' => 'nik',
                            'label' => 'NIK',
                            'type' => 'number',
                            'required' => true
                        ],
                        [
                            'name' => 'nama',
                            'label' => 'Nama Lengkap',
                            'type' => 'text',
                            'required' => true
                        ],
                        [
                            'name' => 'jenis_kelamin',
                            'label' => 'Jenis Kelamin',
                            'type' => 'select',
                            'options' => ['Laki-laki', 'Perempuan']
                        ],
                        [
                            'name' => 'shdk',
                            'label' => 'SHDK',
                            'type' => 'text',
                            'placeholder' => 'Status Hubungan'
                        ]
                    ]
                ]
            ],

            // ============================================
            // DATA TARGET / DATA TERKAIT
            // ============================================
            [
                'name' => 'target_nama',
                'label' => 'Nama Lengkap',
                'type' => 'text',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 100
                ]
            ],
            [
                'name' => 'target_nik',
                'label' => 'NIK',
                'type' => 'number',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => [
                    'maxlength' => 16
                ]
            ],
            [
                'name' => 'target_tempat_lahir',
                'label' => 'Tempat Lahir',
                'type' => 'text',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'target_tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'type' => 'date',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'target_jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'type' => 'select',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => [
                    'options' => ['Laki-laki', 'Perempuan']
                ]
            ],
            [
                'name' => 'target_agama',
                'label' => 'Agama',
                'type' => 'select',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => [
                    'options' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']
                ]
            ],
            [
                'name' => 'target_pekerjaan',
                'label' => 'Pekerjaan',
                'type' => 'text',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'target_kewarganegaraan',
                'label' => 'Kewarganegaraan',
                'type' => 'select',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => [
                    'options' => ['WNI', 'WNA']
                ]
            ],
            [
                'name' => 'target_alamat',
                'label' => 'Alamat',
                'type' => 'textarea',
                'category' => 'Target',
                'is_required_default' => false,
                'attributes' => [
                    'rows' => 3
                ]
            ],

            // ============================================
            // WAJIB ADA DI SEMUA FORM
            // ============================================
            [
                'name' => 'keperluan',
                'label' => 'Keperluan',
                'type' => 'textarea',
                'category' => 'Wajib',
                'is_required_default' => true,
                'is_always_active' => true,
                'attributes' => [
                    'placeholder' => 'Jelaskan keperluan surat ini',
                    'rows' => 2
                ]
            ],
            [
                'name' => 'no_hp',
                'label' => 'No HP',
                'type' => 'tel',
                'category' => 'Wajib',
                'is_required_default' => true,
                'is_always_active' => true,
                'attributes' => [
                    'placeholder' => 'Masukkan nomor HP',
                    'pattern' => '[0-9]{10,13}'
                ]
            ],
            [
                'name' => 'upload_kartu_keluarga',
                'label' => 'Upload Kartu Keluarga',
                'type' => 'file',
                'category' => 'Wajib',
                'is_required_default' => true,
                'is_always_active' => true,
                'attributes' => [
                    'accept' => '.pdf',
                    'max_size' => '2048' // KB
                ]
            ],

            // ============================================
            // PREVIEW CONTENT (Untuk bagian tengah surat)
            // ============================================
            [
                'name' => 'container_pas_foto_2x3',
                'label' => 'Pas Foto 2x3',
                'type' => 'file',
                'category' => 'Preview',
                'is_required_default' => false,
                'attributes' => [
                    'accept' => '.jpg,.jpeg,.png'
                ]
            ],

            // ============================================
            // FOOTER (Untuk bagian bawah surat)
            // ========================================= 
            [
                'name' => 'ttd_kepala_desa',
                'label' => 'Tanda Tangan Kepala Desa',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'container_pas_foto_3x4',
                'label' => 'Pas Foto 3x4',
                'type' => 'file',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => [
                    'accept' => '.jpg,.jpeg,.png'
                ]
            ],
            [
                'name' => 'ttd_pemohon',
                'label' => 'Tanda Tangan Pemohon',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_camat',
                'label' => 'Tanda Tangan Camat',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_saksi_1',
                'label' => 'Tanda Tangan Saksi 1',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_saksi_2',
                'label' => 'Tanda Tangan Saksi 2',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_saksi_3',
                'label' => 'Tanda Tangan Saksi 3',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_saksi_4',
                'label' => 'Tanda Tangan Saksi 4',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_ketua_rt',
                'label' => 'Tanda Tangan Ketua RT',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_ketua_rw',
                'label' => 'Tanda Tangan Ketua RW',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
            [
                'name' => 'ttd_petugas_p4',
                'label' => 'Tanda Tangan Petugas P4 Desa',
                'type' => 'signature',
                'category' => 'Footer',
                'is_required_default' => false,
                'attributes' => []
            ],
        ];

        foreach ($templates as $template) {
            FormFieldTemplate::create($template);
        }
    }
}