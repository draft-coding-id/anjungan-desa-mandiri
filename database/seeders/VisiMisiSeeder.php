<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'judul' => 'VISI',
            'konten' => ["Mewujudkan Desa Rawapanjang BERKAH (Bersih, Kuat dan Sejahtera)"]
        ]);
        VisiMisi::create([
            'judul' => 'MISI',
            'konten' => [
                "Menjadikkan Desa Yang BERSIH Masyarakat, Lingkungan dan Pemerintahannya.",
                "Menjadikan Desa Yang KUAT Budaya, Ekonomi, Sosial dan Kesehatan",
                "Menjadikan Desa yang SEJAHTERA Masyarakatnya"
            ]
        ]);
        VisiMisi::create([
            'judul' => 'TUJUAN',
            'konten' => [
                "Terwujudnya Pemerintahan yang Bersih dan Transparan",
                "Terwujudnya Masyarakat Yang Memiliki Prilaku Budaya Hidup Bersih",
                "Terwujudnya Lingkungan Yang Bersih, Aman, Nyaman dan Asri",
                "Terwujudnya Pemerintahan yang Kuat Perangkat dan Kelembagaannya.",
                "Terwujudnya Pemerintah Desa Digitalisasi Pelayanan, Administrasi dan Media Informasinya",
                "Terwujudnya Masyarakat Yang Kuat Jasmani, Agama, Sosial, Budaya, Pendidikan dan Ekonominya.",
                "Terwujudnya Pengembangan Potensi Desa Secara Baik dan Benar.",
                "Terwujudnya Pemerintah Yang Berkeadilan Sosial Bagi Seluruh Masyarakat.",
                "Terwujudnya Masyarakat yang Sejahtera."
            ]
        ]);
        VisiMisi::create([
            'judul' => 'SASARAN',
            'konten' => [
                "Bebas Korupsi, Kolusi dan Nepotisme/KKN",
                "Transparasi dalam Perencanaan dan Realisasi",
                "Desa/Kampung Ramah Lingkungan",
                "Desa Proklim",
                "Desa Digital",
                "Desa Wisata",
                "Desa Cerdas",
                "Desa Relegius",
                "Desa Membangun",
                "Desa Sehat",
                "Desa Tangguh Bencana (DESTANA)",
                "Desa Bersih Narkoba (BERSINAR)",
                "Desa Mandiri dan Sejahtera.",
                "Desa Ramah Perempuan dan Peduli Anak",
                "Desa Tangguh dan Aman",
                "Desa Literasi",
                "Desa Gotong Royong",
                "Desa Sinergitas",
                "Desa Tahan Pangan",
                "Desa Sadar Hukum",
                "Desa Siaga",
                "Desa Juara"
            ]
        ]);
        VisiMisi::create([
            'judul' => 'STRATEGI',
            'konten' => [
                "Membangun Lembaga Desa yang bebas dari KKN dan Korupsi. Birokrasi yg Bersih",
                "Membangun Transparansi / bebas korupsi",
                "Memberikan pelayanan yang ramah, sopan dan baik./ bebas pungli",
                "Membangun masyarakat yg religius (Melalui keg.: Majelis Taklim, Tempat Ibadah, Peringatan Hari Besar Islam, Pendidikan)",
                "Membangun Lingkungan Desa yang Bersih dan Asri.",
                "Membangun Lembaga desa yang peduli dan kompak",
                "Membangun dan Mengembangkan UMKM",
                "Membangun Ekonomi Desa yang Tangguh",
                "Membudayakan Cinta Produk Desa",
                "Membangun Desa yg Aman",
                "Membangun Desa yg Cerdas",
                "Membangun Desa yang Berprestasi",
                "Membangun Desa yang Sehat",
                "Membangun / Rehabilitasi sarana dan prasarana desa yang lebih baik.",
                "Membangun Desa yang bebas dari Pengangguran.",
                "Membangun Desa yang bebas dari Keluarga Miskin",
                "Membangun Desa yg bebas dari Rumah tidak Layak Huni",
                "Membangun Desa yg bebas dari Anak yg tidak sekolah"
            ]
        ]);
    }
}
