<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use App\Models\DokumenHukum;
use Carbon\Carbon;

class DokumenHukumSeeder extends Seeder
{
    public function run()
    {
        // Jenis Dokumen
        $jenis = [
            ['nama_jenis' => 'Undang-Undang', 'deskripsi' => 'Produk hukum tingkat UU'],
            ['nama_jenis' => 'Peraturan Pemerintah', 'deskripsi' => 'Peraturan tingkat pemerintah'],
            ['nama_jenis' => 'Peraturan Presiden', 'deskripsi' => 'Peraturan tingkat presiden'],
            ['nama_jenis' => 'Keputusan Menteri', 'deskripsi' => 'Keputusan tingkat menteri'],
        ];

        foreach ($jenis as $j) {
            JenisDokumen::create($j);
        }

        // Kategori Dokumen
        $kategori = [
            ['nama' => 'Hukum Pidana', 'deskripsi' => 'Dokumen hukum pidana'],
            ['nama' => 'Hukum Perdata', 'deskripsi' => 'Dokumen hukum perdata'],
            ['nama' => 'Hukum Administrasi', 'deskripsi' => 'Dokumen hukum administrasi'],
            ['nama' => 'Hukum Dagang', 'deskripsi' => 'Dokumen hukum dagang'],
        ];

        foreach ($kategori as $k) {
            KategoriDokumen::create($k);
        }

        // Dokumen Hukum Contoh
        $dokumen = [
            [
                'jenis_id' => 1,
                'kategori_id' => 1,
                'nomor' => 'UU No. 1 Tahun 2024',
                'judul' => 'Undang-Undang tentang Kitab Undang-Undang Hukum Pidana',
                'tanggal' => '2024-01-15',
                'ringkasan' => 'Undang-undang yang mengatur tentang hukum pidana di Indonesia termasuk tindak pidana, sanksi, dan proses peradilan pidana.',
                'status' => 'active'
            ],
            [
                'jenis_id' => 2,
                'kategori_id' => 2,
                'nomor' => 'PP No. 25 Tahun 2024',
                'judul' => 'Peraturan Pemerintah tentang Hak dan Kewajiban dalam Hukum Perdata',
                'tanggal' => '2024-03-20',
                'ringkasan' => 'Peraturan pemerintah yang mengatur hubungan hukum antara orang perorangan dalam masyarakat termasuk hak dan kewajiban para pihak.',
                'status' => 'active'
            ],
            [
                'jenis_id' => 3,
                'kategori_id' => 3,
                'nomor' => 'Perpres No. 10 Tahun 2024',
                'judul' => 'Peraturan Presiden tentang Reformasi Birokrasi',
                'tanggal' => '2024-02-10',
                'ringkasan' => 'Peraturan presiden yang bertujuan untuk meningkatkan efisiensi dan efektivitas pelayanan publik melalui reformasi birokrasi.',
                'status' => 'active'
            ],
        ];

        foreach ($dokumen as $d) {
            DokumenHukum::create($d);
        }
    }
}