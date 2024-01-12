<?php

namespace Database\Seeders;

use App\Models\LandingInfoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandingInfoModel::truncate();
        LandingInfoModel::create([
            'description' => 'Yayasan Lentera Kasih Agape (selanjutnya disingkat YLKA) adalah organisasi yang sebelumnya berdiri atas nama sebuah lembaga, yaitu Lembaga Obor Sahabat (LOS) yang berdiri sejak Maret 2008. Pelayanan LOS berfokus kepada komunitas, Gereja dan Anak namun atas dasar kebutuhan pengembangan pelayanan maka Lembaga LOS ditutup dan pelayanannya dialihkan kepada YLKA.',
            'history' => 'Yayasan Lentera Kasih Agape (selanjutnya disingkat YLKA) adalah organisasi yang sebelumnya berdiri atas nama sebuah lembaga, yaitu Lembaga Obor Sahabat (LOS) yang berdiri sejak Maret 2008. Pelayanan LOS berfokus kepada komunitas, Gereja dan Anak namun atas dasar kebutuhan pengembangan pelayanan maka Lembaga LOS ditutup dan pelayanannya dialihkan kepada YLKA. Maka pelayanan YLKA tetap bergerak dan melakukan suatu pendekatan misi melalui Gereja, pelayanan anak-anak dan komunitas, yang selanjutnya disebut 3C (Church, Children, Community)',
            'visi_mission' => 'Visi YLKA yaitu “Dunia bagi Kristus,” karena itu YLKA akan senantiasa melakukan kerjasama dengan berbagai pihak dari berbagai gereja, daerah, denominasi di dalam dan di luar negeri. Maksudnya YLKA ingin melihat “orang yang diselamatkan sebagai pengikut yang ditebus Yesus.”',
            'partnership' => 'Dalam mengemban misi tersebut, YLKA bekerjasama dengan mitra-mitra/rekan pada tingkat nasional ataupun lokal, seperti: gereja, organisasi/lembaga agama, pemerintah atau kelompok-kelompok yang ada di masyarakat.',
        ]);
    }
}
