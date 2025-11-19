<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenHukum;
use App\Models\JenisDokumen;
use App\Models\KategoriDokumen;
use Faker\Factory as Faker;

class DokumenHukumSeeder extends Seeder
{
    public function run(): void
    {
        // Faker Bahasa Indonesia
        $faker = Faker::create('id_ID');

        // Ambil jenis & kategori
        $jenisList = JenisDokumen::pluck('jenis_id')->toArray();
        $kategoriList = KategoriDokumen::pluck('kategori_id')->toArray();

        // Jika belum ada data jenis
        if (empty($jenisList)) {
            $jenisList = [
                JenisDokumen::create(['nama' => 'Peraturan Bupati', 'deskripsi' => ''])->jenis_id,
                JenisDokumen::create(['nama' => 'Peraturan Daerah', 'deskripsi' => ''])->jenis_id,
                JenisDokumen::create(['nama' => 'Keputusan Bupati', 'deskripsi' => ''])->jenis_id,
                JenisDokumen::create(['nama' => 'Instruksi Bupati', 'deskripsi' => ''])->jenis_id,
            ];
        }

        // Jika belum ada data kategori
        if (empty($kategoriList)) {
            $kategoriList = [
                KategoriDokumen::create(['nama' => 'Pemerintahan', 'deskripsi' => ''])->kategori_id,
                KategoriDokumen::create(['nama' => 'Kesehatan', 'deskripsi' => ''])->kategori_id,
                KategoriDokumen::create(['nama' => 'Perekonomian', 'deskripsi' => ''])->kategori_id,
                KategoriDokumen::create(['nama' => 'Pendidikan', 'deskripsi' => ''])->kategori_id,
                KategoriDokumen::create(['nama' => 'Infrastruktur', 'deskripsi' => ''])->kategori_id,
            ];
        }

        // LIST judul khas Indonesia
        $judulIndo = [
            'Pelaksanaan Penyelenggaraan Pemerintahan Daerah',
            'Pengelolaan Dana Desa Tahun Anggaran',
            'Peningkatan Mutu Layanan Kesehatan Masyarakat',
            'Pembangunan Infrastruktur Wilayah',
            'Percepatan Digitalisasi Administrasi Pemerintahan',
            'Pelaksanaan Program Keluarga Sejahtera',
            'Penguatan Ekonomi Lokal Berbasis UMKM',
            'Pengawasan Pengelolaan Barang Milik Daerah',
            'Tata Cara Perizinan Usaha Mikro',
            'Pedoman Standar Operasional Pelayanan Publik'
        ];

        // Status Indonesia asli
        $statusIndo = ['Berlaku', 'Dicabut', 'Revisi', 'Tidak Berlaku'];

        // Generate 30 dokumen
        for ($i = 0; $i < 30; $i++) {

            // Nomor dokumen mirip format Indonesia
            $nomor = $faker->numberBetween(1, 300) . "/" .
                     strtoupper($faker->randomLetter()) . strtoupper($faker->randomLetter()) . "/" .
                     $faker->numberBetween(2020, 2025);

            DokumenHukum::create([
                'jenis_id' => $faker->randomElement($jenisList),
                'kategori_id' => $faker->randomElement($kategoriList),

                'nomor'      => $nomor,

                'judul'      => $faker->randomElement($judulIndo),

                'tanggal'    => $faker->date(),

                'ringkasan'  => $faker->randomElement([
                    'Dokumen ini mengatur pelaksanaan kebijakan pemerintah daerah.',
                    'Berisi ketentuan mengenai standar layanan publik bagi masyarakat.',
                    'Memuat pengaturan terkait pengelolaan program pembangunan daerah.',
                    'Mengatur tata cara pelaksanaan kebijakan strategis pemerintah.',
                    'Berisi pedoman teknis pelaksanaan peraturan perundang-undangan.'
                ]),

                'status'     => $faker->randomElement($statusIndo),
            ]);
        }
    }
}
