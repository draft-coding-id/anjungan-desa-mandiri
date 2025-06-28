<?php

namespace Database\Seeders;

use App\Models\SejarahDesa;
use Illuminate\Database\Seeder;

class SejarahDesaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    SejarahDesa::create([
      'judul' => 'Sejarah Desa Rawa Panjang',
      'content' => "Desa Rawa Panjang adalah salah satu desa di Kecamatan Bojong Gede Kabupaten Bogor. Merupakan desa pemekaran dari Desa Pabuaran Kecamatan Bojong Gede Kabupaten Bogor
sejak Tahun 1984. Nama Desa Rawapanjang berasal dari tiga
  kampung yang ada, yaitu Kampung Rawa,
  Kampung Kelapa dan Kampung Panjang. Dengan
  rincian sebagai berikut : Rawa (Kampung
  Rawa) - Pa (Kampung Kelapa) - njang
  (Kampung Panjang), maka tersusunlah menjadi
  Rawa Panjang yang selanjutnya menjadi nama
  Desa Rawapanjang sampai sekarang. Desa Rawa Panjang terletak pada koordinat
  Bujur 106.812248 dan Koordinat Lintang
  -6.465607 dengan ketinggian 115 Meter diatas
  permukaan laut, merupakan Desa terluar di
  Kecamatan Bojonggede dan Desa terluar di
  Kabupaten Bogor dengan luas wilayah 315
  Hektar yang terbagi menjadi 4 Dusun, 24
  Rukun Warga dan 141 Rukun Tetangga. Berdasarkan data Monografi desa tahun 2021
  total penduduk desa Rawapanjang mencapai
  48.942 jiwa yang mana berasal dari 14.019
  keluarga mereka semua hidup damai dan saling
  berdampingan dengan baik. Desa Rawa Panjang
  dikenal dengan desa 1000 majelis talim
  dikarenakan dengan begitu banyaknya fasilitas
  beribadah dan tempat menuntut ilmu agama
  sehingga banyak kegiatan masyarakat bernuansa
  agamis dan religius yang kental. Dengan total
  12.717 rumah dan bangunan yang berdiri, Desa ini lebih dari cukup segala kebutuhan
  masyarakat umumnya, dengan sumber daya
  manusia yang produktif ekonomi mereka menjadi
  terpenuhi dengan berbagai cara, salah satunya
  adalah Kerajinan Rotan yang menjadi roda
  perekonomian Desa dan berwirausaha dalam
  berbagai macam produk kebutuhan pokok
  masyarakat Desa.",
      'pemimpin_desa' => [
        [
          'nama' => 'Dimiyati (Alm)',
          'mulai_jabat' => '1984-01-01',
          'akhir_jabat' => '1985-12-31'
        ],
        [
          'nama' => 'Acep (Alm)',
          'mulai_jabat' => '1985-01-01',
          'akhir_jabat' => '1994-12-31'
        ],
        [
          'nama' => 'Acep (Alm)',
          'mulai_jabat' => '1994-01-01',
          'akhir_jabat' => '2003-12-31'
        ],
        [
          'nama' => 'Asmat H Naming (Alm)',
          'mulai_jabat' => '2003-01-01',
          'akhir_jabat' => '2008-12-31'
        ],
        [
          'nama' => 'Asmat H. Naming (Alm)',
          'mulai_jabat' => '2008-01-01',
          'akhir_jabat' => '2014-12-31'
        ],
        [
          'nama' => 'Marulloh',
          'mulai_jabat' => '2014-01-01',
          'akhir_jabat' => '2020-12-31'
        ],
        [
          'nama' => 'Mohammad Agus',
          'mulai_jabat' => '2021-01-01',
          'akhir_jabat' => '2027-12-31'
        ]
      ]
    ]);
  }
}
