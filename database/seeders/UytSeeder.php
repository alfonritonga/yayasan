<?php

namespace Database\Seeders;

use App\Models\UytContent;
use App\Models\UytFacilitator;
use App\Models\UytResource;
use Illuminate\Database\Seeder;

class UytSeeder extends Seeder
{
    public function run(): void
    {
        // Konten utama UYT
        $contents = [
            [
                'key' => 'hero',
                'title' => 'Melihat Apa yang Tuhan Percayakan. Menggunakannya Menjadi Berkat.',
                'subtitle' => 'Use Your Talents (UYT) adalah gerakan yang membantu individu, gereja, dan komunitas mengenali talenta, relasi, pengalaman, dan aset yang telah Tuhan percayakan untuk melayani serta membawa perubahan.',
                'content' => 'Use Your Talents (UYT) mendorong kita untuk tidak berfokus pada apa yang tidak kita miliki, melainkan melihat apa yang sudah ada di tangan kita dan mengembangkannya secara maksimal demi kemuliaan Tuhan dan kesejahteraan sesama.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'key' => 'mengenal_uyt',
                'title' => 'Mengenal Use Your Talents (UYT)',
                'subtitle' => 'Gerakan Pemberdayaan Berbasis Aset & Talenta',
                'content' => '<p>Use Your Talents (UYT) berakar dari pemahaman bahwa setiap orang dan komunitas telah dianugerahi potensi unik oleh Tuhan. Alih-alih bergantung semata pada bantuan luar, UYT menggerakkan gereja dan komunitas untuk memobilisasi sumber daya lokal yang telah ada.</p><p>Gerakan ini telah menginspirasi ribuan jemaat dan komunitas di berbagai wilayah untuk bertransformasi melalui inisiatif mandiri, kewirausahaan sosial, dan pelayanan kasih.</p>',
            ],
            [
                'key' => 'landasan_alkitab',
                'title' => 'Landasan Alkitab UYT',
                'subtitle' => 'Prinsip Penatalayanan dan Tanggung Jawab Kristiani',
                'content' => '<p><strong>Matius 25:14-30 (Perumpamaan tentang Talenta)</strong>: Tuhan mempercayakan talenta kepada setiap hamba-Nya seturut kesanggupan masing-masing. Kita dipanggil untuk mengelolanya dengan setia, berani berinovasi, dan menghasilkan buah bagi Kerajaan Allah.</p><p><strong>1 Petrus 4:10</strong>: <em>"Layanilah seorang akan yang lain, sesuai dengan karunia yang telah diperoleh tiap-tiap orang sebagai pengurus yang baik dari kasih karunia Allah."</em></p><p><strong>Keluaran 4:2</strong>: <em>"TUHAN berfirman kepadanya: Apakah yang di tanganmu itu? Jawab Musa: Tongkat."</em> Tuhan memakai apa yang sederhana yang sudah ada pada kita untuk karya-Nya yang besar.</p>',
            ],
            [
                'key' => 'cara_kerja',
                'title' => 'Cara Kerja UYT',
                'subtitle' => 'Langkah Nyata Menuju Perubahan yang Berkelanjutan',
                'content' => '<ol><li><strong>1. Discover (Menemukan)</strong>: Mengidentifikasi talenta, keahlian, pengalaman, dan aset fisik/sosial yang sudah ada di dalam diri atau komunitas.</li><li><strong>2. Envision (Mengimajinasikan)</strong>: Merumuskan visi bersama mengenai apa yang bisa dicapai dan diubahkan dengan potensi yang ada.</li><li><strong>3. Plan & Act (Merencanakan & Bertindak)</strong>: Mengambil langkah nyata tanpa menunggu bantuan eksternal, memanfaatkan jejaring dan kerja sama lokal.</li><li><strong>4. Celebrate & Multiply (Merayakan & Mengembangkan)</strong>: Merayakan setiap keberhasilan kecil dan membagikan inspirasi ke komunitas lain.</li></ol>',
            ],
            [
                'key' => 'fasilitator_info',
                'title' => 'Fasilitator UYT',
                'subtitle' => 'Katalisator Perubahan dalam Komunitas',
                'content' => '<p><strong>Apa itu Fasilitator UYT?</strong><br>Fasilitator UYT adalah individu yang dilatih dan diperlengkapi untuk memandu proses penemuan talenta, memfasilitasi workshop, serta mendampingi gereja dan komunitas merancang aksi nyata.</p><p><strong>Siapa Fasilitator UYT?</strong><br>Para pendeta, pelayan jemaat, aktivis pemuda, pendidik, dan penggerak masyarakat yang memiliki hati untuk memberdayakan sesama.</p><p><strong>Bagaimana Menjadi Fasilitator?</strong><br>Mengikuti Training of Trainers (ToT) UYT, mempraktikkan fasilitasi workshop di komunitas lokal, dan terhubung dengan jejaring fasilitator UYT Indonesia.</p>',
            ],
            [
                'key' => 'mitra_workshop',
                'title' => 'Kemitraan & Workshop UYT',
                'subtitle' => 'Bersama Menggerakkan Transformasi',
                'content' => '<p><strong>Apa yang Didapat?</strong><br>Modul pelatihan praktis, pendampingan fasilitator berpengalaman, materi presentasi dan workbook, serta akses ke jejaring komunitas pemberdayaan UYT.</p><p><strong>Jenis Workshop yang Tersedia:</strong><br>1. <em>Basic UYT Awareness (1 Hari)</em> - Pengenalan konsep dasar dan penemuan aset.<br>2. <em>Interactive Community Workshop (2-3 Hari)</em> - Pendalaman pemetaan potensi dan perumusan proyek aksi.<br>3. <em>Training of Facilitators (ToF)</em> - Pelatihan intensif untuk menjadi fasilitator mandiri.</p>',
            ]
        ];

        foreach ($contents as $c) {
            UytContent::updateOrCreate(['key' => $c['key']], $c);
        }

        // Resources bawaan
        $resources = [
            ['title' => 'Panduan Pengenalan Use Your Talents (PDF)', 'category' => 'dokumen', 'file_path' => 'front/documents/Panduan_UYT_Indonesia.pdf', 'description' => 'Buku saku pengantar konsep dasar Use Your Talents dan studi kasus.'],
            ['title' => 'Lembar Kerja Pemetaan Talenta & Aset', 'category' => 'dokumen', 'file_path' => 'front/documents/Workbook_Pemetaan_Talenta.pdf', 'description' => 'Formulir latihan untuk mengenali potensi pribadi dan jemaat.'],
            ['title' => 'Slide Presentasi: Prinsip Alkitabiah UYT', 'category' => 'presentasi', 'file_path' => 'front/documents/Presentasi_Landasan_Alkitab.pptx', 'description' => 'Materi tayang untuk sosialisasi di gereja atau kelompok sel.'],
            ['title' => 'Slide Presentasi: Cara Kerja & Metodologi UYT', 'category' => 'presentasi', 'file_path' => 'front/documents/Presentasi_Metodologi_UYT.pptx', 'description' => 'Slide langkah-langkah implementasi gerakan UYT di lapangan.'],
        ];

        foreach ($resources as $r) {
            UytResource::updateOrCreate(['title' => $r['title']], $r);
        }

        // Fasilitator bawaan
        $facilitators = [
            [
                'name' => 'Pdt. Andreas Wicaksono, M.Th',
                'role' => 'Master Trainer UYT',
                'location' => 'Jakarta',
                'testimony' => 'Gerakan UYT membuka mata jemaat kami bahwa gereja tidak miskin. Melalui talenta dan aset yang selama ini tersembunyi, kami mampu memulai program ketahanan pangan mandiri.',
                'order_num' => 1,
            ],
            [
                'name' => 'Maria Kristina, S.Sos',
                'role' => 'Fasilitator Pemberdayaan Pemuda',
                'location' => 'Yogyakarta',
                'testimony' => 'Anak-anak muda menjadi sangat antusias ketika mereka menyadari keahlian digital dan kreativitas mereka bisa langsung menjadi alat berkat bagi UMKM jemaat.',
                'order_num' => 2,
            ],
            [
                'name' => 'Daniel Surya, S.P',
                'role' => 'Fasilitator Komunitas & Pertanian',
                'location' => 'Sumatera Utara',
                'testimony' => 'UYT bukan tentang berapa banyak dana hibah yang kita miliki, melainkan bagaimana kita bersyukur dan memaksimalkan lahan serta jejaring yang ada.',
                'order_num' => 3,
            ],
        ];

        foreach ($facilitators as $f) {
            UytFacilitator::updateOrCreate(['name' => $f['name']], $f);
        }
    }
}
