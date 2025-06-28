<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatistikController extends Controller
{
    public function index()
    {
        $countWarga = Warga::all()->count();
        return view('warga.profil_desa.statistik-desa' , [
            'countWarga' => $countWarga
        ]);
    }

    public function getStatistik($kategori)
    {
        try {
            switch ($kategori) {
                case 'jenis_kelamin':
                    return $this->getJenisKelaminStats();

                case 'kategori_usia':
                    return $this->getKategoriUsiaStats();
                
                case 'rentang_usia':
                    return $this->getRentangUmurStats();    

                case 'agama':
                    return $this->getAgamaStats();

                case 'pekerjaan':
                    return $this->getPekerjaanStats();

                case 'kecamatan':
                    return $this->getKecamatanStats();

                default:
                    return response()->json(['error' => 'Kategori tidak valid'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil data'], 500);
        }
    }

    private function getJenisKelaminStats()
    {
        $stats = DB::table('warga')
            ->select('jenis_kelamin', DB::raw('COUNT(*) as count'))
            ->groupBy('jenis_kelamin')
            ->get()
            ->map(function ($item) {
                return [
                    'label' => $item->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan',
                    'count' => $item->count
                ];
            });

        return response()->json($stats);
    }

    private function getRentangUmurStats()
    {
        // Hitung usia berdasarkan tanggal lahir dengan rentang yang lebih detail
        $wargas = DB::table('warga')
            ->select('tanggal_lahir')
            ->whereNotNull('tanggal_lahir')
            ->get();

        $rentangUmur = [
            'Di bawah 1 Tahun' => 0,
            '2 s/d 4 Tahun' => 0,
            '5 s/d 9 Tahun' => 0,
            '10 s/d 14 Tahun' => 0,
            '15 s/d 19 Tahun' => 0,
            '20 s/d 24 Tahun' => 0,
            '25 s/d 29 Tahun' => 0,
            '30 s/d 34 Tahun' => 0,
            '35 s/d 39 Tahun' => 0,
            '40 s/d 44 Tahun' => 0,
            '45 s/d 49 Tahun' => 0,
            '50 s/d 54 Tahun' => 0,
            '55 s/d 59 Tahun' => 0,
            '60 s/d 64 Tahun' => 0,
            '65 s/d 69 Tahun' => 0,
            '70 s/d 74 Tahun' => 0,
            'Di atas 75 Tahun' => 0
        ];

        foreach ($wargas as $warga) {
            $usia = Carbon::parse($warga->tanggal_lahir)->age;

            if ($usia < 1) {
                $rentangUmur['Di bawah 1 Tahun']++;
            } elseif ($usia >= 2 && $usia <= 4) {
                $rentangUmur['2 s/d 4 Tahun']++;
            } elseif ($usia >= 5 && $usia <= 9) {
                $rentangUmur['5 s/d 9 Tahun']++;
            } elseif ($usia >= 10 && $usia <= 14) {
                $rentangUmur['10 s/d 14 Tahun']++;
            } elseif ($usia >= 15 && $usia <= 19) {
                $rentangUmur['15 s/d 19 Tahun']++;
            } elseif ($usia >= 20 && $usia <= 24) {
                $rentangUmur['20 s/d 24 Tahun']++;
            } elseif ($usia >= 25 && $usia <= 29) {
                $rentangUmur['25 s/d 29 Tahun']++;
            } elseif ($usia >= 30 && $usia <= 34) {
                $rentangUmur['30 s/d 34 Tahun']++;
            } elseif ($usia >= 35 && $usia <= 39) {
                $rentangUmur['35 s/d 39 Tahun']++;
            } elseif ($usia >= 40 && $usia <= 44) {
                $rentangUmur['40 s/d 44 Tahun']++;
            } elseif ($usia >= 45 && $usia <= 49) {
                $rentangUmur['45 s/d 49 Tahun']++;
            } elseif ($usia >= 50 && $usia <= 54) {
                $rentangUmur['50 s/d 54 Tahun']++;
            } elseif ($usia >= 55 && $usia <= 59) {
                $rentangUmur['55 s/d 59 Tahun']++;
            } elseif ($usia >= 60 && $usia <= 64) {
                $rentangUmur['60 s/d 64 Tahun']++;
            } elseif ($usia >= 65 && $usia <= 69) {
                $rentangUmur['65 s/d 69 Tahun']++;
            } elseif ($usia >= 70 && $usia <= 74) {
                $rentangUmur['70 s/d 74 Tahun']++;
            } else {
                $rentangUmur['Di atas 75 Tahun']++;
            }
        }

        $stats = collect($rentangUmur)->map(function ($count, $label) {
            return [
                'label' => $label,
                'count' => $count
            ];
        })->filter(function ($item) {
            return $item['count'] > 0; // Hanya tampilkan kategori yang ada datanya
        })->values();

        return response()->json($stats);
    }

    private function getKategoriUsiaStats()
    {
        // Hitung usia berdasarkan tanggal lahir
        $wargas = DB::table('warga')
            ->select('tanggal_lahir')
            ->whereNotNull('tanggal_lahir')
            ->get();

        $kategoriUsia = [
            'Balita (0-5 tahun)' => 0,
            'Anak-anak (6-12 tahun)' => 0,
            'Remaja (13-17 tahun)' => 0,
            'Dewasa Muda (18-25 tahun)' => 0,
            'Dewasa (26-45 tahun)' => 0,
            'Paruh Baya (46-65 tahun)' => 0,
            'Lansia (>65 tahun)' => 0
        ];

        foreach ($wargas as $warga) {
            $usia = Carbon::parse($warga->tanggal_lahir)->age;

            if ($usia <= 5) {
                $kategoriUsia['Balita (0-5 tahun)']++;
            } elseif ($usia <= 12) {
                $kategoriUsia['Anak-anak (6-12 tahun)']++;
            } elseif ($usia <= 17) {
                $kategoriUsia['Remaja (13-17 tahun)']++;
            } elseif ($usia <= 25) {
                $kategoriUsia['Dewasa Muda (18-25 tahun)']++;
            } elseif ($usia <= 45) {
                $kategoriUsia['Dewasa (26-45 tahun)']++;
            } elseif ($usia <= 65) {
                $kategoriUsia['Paruh Baya (46-65 tahun)']++;
            } else {
                $kategoriUsia['Lansia (>65 tahun)']++;
            }
        }

        $stats = collect($kategoriUsia)->map(function ($count, $label) {
            return [
                'label' => $label,
                'count' => $count
            ];
        })->filter(function ($item) {
            return $item['count'] > 0; // Hanya tampilkan kategori yang ada datanya
        })->values();

        return response()->json($stats);
    }

    private function getAgamaStats()
    {
        $stats = DB::table('warga')
            ->select('agama', DB::raw('COUNT(*) as count'))
            ->groupBy('agama')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'label' => ucfirst($item->agama),
                    'count' => $item->count
                ];
            });

        return response()->json($stats);
    }

    private function getPekerjaanStats()
    {
        $stats = DB::table('warga')
            ->select('pekerjaan', DB::raw('COUNT(*) as count'))
            ->groupBy('pekerjaan')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'label' => ucfirst($item->pekerjaan),
                    'count' => $item->count
                ];
            });

        return response()->json($stats);
    }

    private function getKecamatanStats()
    {
        $stats = DB::table('warga')
            ->select('kecamatan', DB::raw('COUNT(*) as count'))
            ->groupBy('kecamatan')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'label' => ucfirst($item->kecamatan),
                    'count' => $item->count
                ];
            });

        return response()->json($stats);
    }

    // Method untuk mendapatkan ringkasan statistik umum
    public function getRingkasanStats()
    {
        $totalWarga = DB::table('warga')->count();
        $totalLakiLaki = DB::table('warga')->where('jenis_kelamin', 'L')->count();
        $totalPerempuan = DB::table('warga')->where('jenis_kelamin', 'P')->count();

        // Hitung rata-rata usia
        $wargas = DB::table('warga')
            ->select('tanggal_lahir')
            ->whereNotNull('tanggal_lahir')
            ->get();

        $totalUsia = 0;
        $jumlahWargaDenganTanggalLahir = 0;

        foreach ($wargas as $warga) {
            $totalUsia += Carbon::parse($warga->tanggal_lahir)->age;
            $jumlahWargaDenganTanggalLahir++;
        }

        $rataRataUsia = $jumlahWargaDenganTanggalLahir > 0 ?
            round($totalUsia / $jumlahWargaDenganTanggalLahir, 1) : 0;

        return response()->json([
            'total_warga' => $totalWarga,
            'total_laki_laki' => $totalLakiLaki,
            'total_perempuan' => $totalPerempuan,
            'rata_rata_usia' => $rataRataUsia
        ]);
    }
}
