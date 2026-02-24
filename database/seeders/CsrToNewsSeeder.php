<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class CsrToNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Pemberian Bantuan Pendidikan Siswa Berprestasi',
                'description' => 'Kami berkomitmen untuk mendukung masa depan generasi muda melalui program beasiswa pendidikan bagi siswa berprestasi namun kurang mampu di wilayah sekitar operasional perusahaan. Tahun ini kami memberikan beasiswa kepada 50 siswa SD, SMP, dan SMA.',
                'date' => '2025-08-15',
                'is_active' => true,
            ],
            [
                'title' => 'Peltra Hijau: Penanaman 1000 Pohon Bakau',
                'description' => 'Sebagai wujud kepedulian terhadap lingkungan pesisir, Peltra mengadakan kegiatan penanaman 1000 bibit pohon bakau di kawasan pesisir pantai utara. Kegiatan ini melibatkan karyawan dan komunitas pecinta alam setempat untuk mencegah abrasi dan menjaga ekosistem laut.',
                'date' => '2025-09-22',
                'is_active' => true,
            ],
            [
                'title' => 'Bantuan Sembako untuk Masyarakat Terdampak Banjir',
                'description' => 'Merespons bencana banjir yang melanda beberapa desa di sekitar area perusahaan, tim CSR Peltra turun langsung menyalurkan bantuan berupa paket sembako, obat-obatan, dan selimut kepada 200 kepala keluarga yang terdampak. Kami berharap bantuan ini dapat sedikit meringankan beban saudara-saudara kita.',
                'date' => '2026-01-10',
                'is_active' => true,
            ],
            [
                'title' => 'Pelatihan Kewirausahaan UMKM Lokal',
                'description' => 'Peltra menyelenggarakan pelatihan kewirausahaan dan pemasaran digital bagi pelaku UMKM di sekitar wilayah perusahaan. Program ini bertujuan untuk memberdayakan ekonomi masyarakat lokal agar dapat tumbuh dan bersaing di era digital.',
                'date' => '2025-11-05',
                'is_active' => true,
            ],
            [
                'title' => 'Donor Darah Rutin Karyawan Peltra',
                'description' => 'Bekerja sama dengan Palang Merah Indonesia (PMI), Peltra kembali menggelar kegiatan donor darah rutin yang diikuti oleh ratusan karyawan. Setetes darah yang disumbangkan sangat berarti bagi mereka yang membutuhkan.',
                'date' => '2025-12-14',
                'is_active' => true,
            ],
        ];

        foreach ($activities as $activity) {
            News::firstOrCreate(
                ['slug' => Str::slug($activity['title'])],
                [
                    'title' => $activity['title'],
                    'content' => $activity['description'],
                    'date' => $activity['date'],
                    'category' => 'csr',
                    'is_active' => $activity['is_active'],
                    'image' => null,
                    'published_at' => now(),
                ]
            );
        }
    }
}
