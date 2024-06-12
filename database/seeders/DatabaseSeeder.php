<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Angkatan;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Periode;
use App\Models\Skema;
use App\Models\Status;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'nama' => 'Yohanes Sigo Balo',
            'nim' => 'D1041191012',
            'status_id' => '3',
            'skema_id' => '1',
            'angkatan_id' => '6',
            'fakultas_id' => '4',
            'prodi_id' => '16',
            'periode_id' => '3',
            'email' => 'yohanessigo@student.untan.ac.id',
            'no_mhs' => '085820052803',
            'no_ortu' => '085754908633',
            'password' => 'Yohanes123',
            // 'is_admin' => '0',
        ]);

        User::create([
            'nama' => 'Ayub Rahmanda',
            'nim' => 'D1041191046',
            'status_id' => '3',
            'skema_id' => '1',
            'angkatan_id' => '6',
            'fakultas_id' => '4',
            'prodi_id' => '16',
            'periode_id' => '1',
            'email' => 'ayub@student.untan.ac.id',
            // 'no_mhs' => '085820052803',
            // 'no_ortu' => '085348322696',
            'password' => 'Ayub123',
            // 'is_admin' => '0',
        ]);

        // HUKUM ILMU HUKUM

        User::create([
            'nama' => 'Zahrah Wulansari',
            'nim' => 'A1011201036',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '1',
            'prodi_id' => '1',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Ahmad Rizal',
            'nim' => 'A1011201037',
            'status_id' => '2',
            'periode_id' => '1',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '1',
            'prodi_id' => '1',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Ari Samudra',
            'nim' => 'A1011201038',
            'status_id' => '2',
            'periode_id' => '1',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '1',
            'prodi_id' => '1',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Dewi Anjelita',
            'nim' => 'A1011201039',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '1',
            'prodi_id' => '1',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Irsyad Adi Fatwa',
            'nim' => 'A1011201040',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '1',
            'prodi_id' => '1',
            'password' => 'User123'
        ]);

        // EKONOMI PEMBANGUNAN EKONOMI & BISNIS

        User::create([
            'nama' => 'Yanri Simbolon',
            'nim' => 'B1011201025',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Yasmin Amelia',
            'nim' => 'B1011201026',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Apung Erlangga',
            'nim' => 'B1011201027',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Debi Anggreini',
            'nim' => 'B1011201028',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Febbi',
            'nim' => 'B1011201029',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Ika Nadia Septiawan',
            'nim' => 'B1011201030',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Jaka',
            'nim' => 'B1011201031',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Nursila',
            'nim' => 'B1011201034',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Novi Oktaviani',
            'nim' => 'B1011201033',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '3',
            'password' => 'User123'
        ]);

        // MANAJEMEN FEB
        User::create([
            'nama' => 'Riska Risma Wardhany',
            'nim' => 'B1021201017',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '4',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Andre Riyadi',
            'nim' => 'B1021201020',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '4',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Burhan',
            'nim' => 'B1021201022',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '2',
            'prodi_id' => '4',
            'password' => 'User123'
        ]);

        // PERTANIAN AGROTEKNOLOGI

        User::create([
            'nama' => 'Ahmad Badar',
            'nim' => 'C1011201019',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '3',
            'prodi_id' => '8',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Diah Lushfieka',
            'nim' => 'C1011201020',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '3',
            'prodi_id' => '8',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Ekas July Putri',
            'nim' => 'C1011201021',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '3',
            'prodi_id' => '8',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Esi Sasmita',
            'nim' => 'C1011201022',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '3',
            'prodi_id' => '8',
            'password' => 'User123'
        ]);


        User::create([
            'nama' => 'Feneranda Anggraeny',
            'nim' => 'C1011201023',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '3',
            'prodi_id' => '8',
            'password' => 'User123'
        ]);

        // TEKNIK SIPIL 

        User::create([
            'nama' => 'Firman Kornel Lase',
            'nim' => 'D1011201024',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '4',
            'prodi_id' => '23',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Luis Figo',
            'nim' => 'D1011201025',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '4',
            'prodi_id' => '23',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Boediono',
            'nim' => 'D1011201086',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '4',
            'prodi_id' => '23',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Rian Apriansyah',
            'nim' => 'D1011201087',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '4',
            'prodi_id' => '23',
            'password' => 'User123'
        ]);


        User::create([
            'nama' => 'Yudik Anggara',
            'nim' => 'D1021201006',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '4',
            'prodi_id' => '14',
            'password' => 'User123'
        ]);

        User::create([
            'nama' => 'Antonius Rajaguk - Guk',
            'nim' => 'D1021201007',
            'skema_id' => '1',
            'angkatan_id' => '1',
            'fakultas_id' => '4',
            'prodi_id' => '14',
            'password' => 'User123'
        ]);


        User::create([
            'nama' => 'Akion',
            'nim' => 'D1041191010',
            'skema_id' => '1',
            'angkatan_id' => '6',
            'fakultas_id' => '4',
            'prodi_id' => '16',
            'email' => 'akion@student.untan.ac.id',
            'password' => 'Akion123'
        ]);



        User::create([
            'nama' => 'Yosua Calvin',
            'nim' => 'D1041191014',
            'skema_id' => '1',
            'angkatan_id' => '6',
            'fakultas_id' => '4',
            'prodi_id' => '16',
            'email' => 'yosua@student.untan.ac.id',
            // 'no_mhs' => '085820052803',
            // 'no_ortu' => '085348322696',
            'password' => 'Yosua123',
            // 'is_admin' => '0',
        ]);

        User::create([
            'nama' => 'Admin',
            'nim' => 'admin',
            // 'no_mhs' => '085820052803',
            // 'no_ortu' => '085348322696',
            'password' => 'admin',
            'role' => 'admin',
            'is_active' => '1',
            // 'is_admin' => '0',


        ]);

        // ANGKATAN

        for ($year = 2020; $year <= 2025; $year++) {
            Angkatan::insert([
                'tahun' => $year,
            ]);
        }

        // Angkatan::create([
        //     'tahun' => '2020'
        // ]);

        // Angkatan::create([
        //     'tahun' => '2021'
        // ]);

        // Angkatan::create([
        //     'tahun' => '2022'
        // ]);

        // Angkatan::create([
        //     'tahun' => '2023'
        // ]);

        // Angkatan::create([
        //     'tahun' => '2024'
        // ]);


        // FAKULTAS

        // Fakultas::create([
        //     'id' => '1',
        //     'nama' => '- Pilih Fakultas -'
        // ]);
        Fakultas::create([
            'slug' => 'hukum',
            'nama' => 'Hukum'
        ]);

        Fakultas::create([
            'slug' => 'feb',
            'nama' => 'Ekonomi dan Bisnis'
        ]);

        Fakultas::create([
            'slug' => 'faperta',
            'nama' => 'Pertanian'
        ]);

        Fakultas::create([
            'slug' => 'teknik',
            'nama' => 'Teknik'
        ]);

        Fakultas::create([
            'slug' => 'fisip',
            'nama' => 'Ilmu Sosial dan Ilmu Politik'
        ]);

        Fakultas::create([
            'slug' => 'fkip',
            'nama' => 'Keguruan dan Ilmu Pendidikan'
        ]);

        Fakultas::create([
            'slug' => 'kehutanan',
            'nama' => 'Kehutanan'
        ]);

        Fakultas::create([
            'slug' => 'mipa',
            'nama' => 'Matematika dan Ilmu Pengetahuan Alam'
        ]);

        Fakultas::create([
            'slug' => 'kedokteran',
            'nama' => 'Kedokteran'
        ]);


        // PROGRAM STUDI

        // Prodi::create([
        //     'id' => '1',
        //     'nama' => '- Pilih Program Studi -'
        // ]);

        // Hukum1
        Prodi::create([
            'nama' => 'Ilmu Hukum',
            'fakultas_id' => '1'
        ]);

        // FEB2
        Prodi::create([
            'nama' => 'Akuntansi',
            'fakultas_id' => '2'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Ekonomi dan Studi Pembangunan',
            'fakultas_id' => '2'
        ]);

        Prodi::create([
            'nama' => 'Manajemen',
            'fakultas_id' => '2'
        ]);

        Prodi::create([
            'nama' => 'Ekonomi Islam',
            'fakultas_id' => '2'
        ]);

        // Pertanian
        Prodi::create([
            'nama' => 'Agribisnis',
            'fakultas_id' => '3'
        ]);

        Prodi::create([
            'nama' => 'Agronomi',
            'fakultas_id' => '3'
        ]);

        Prodi::create([
            'nama' => 'Agroteknologi',
            'fakultas_id' => '3'
        ]);

        Prodi::create([
            'nama' => 'Manajemen Sumber Daya Perairan',
            'fakultas_id' => '3'
        ]);

        Prodi::create([
            'nama' => 'Ilmu peternakan',
            'fakultas_id' => '3'
        ]);

        Prodi::create([
            'nama' => 'Ilmu dan Teknologi Pangan',
            'fakultas_id' => '3'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Tanah',
            'fakultas_id' => '3'
        ]);



        // Teknik
        Prodi::create([
            'nama' => 'Teknik Arsitektur',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Elektro',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Industri',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Informatika',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Lingkungan',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Kelautan',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Kimia',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Mesin',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Perencanaan Wilayah dan Kota',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Pertambangan',
            'fakultas_id' => '4'
        ]);

        Prodi::create([
            'nama' => 'Teknik Sipil',
            'fakultas_id' => '4'
        ]);


        // Fisip
        Prodi::create([
            'nama' => 'Ilmu Administrasi Negara',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Pemerintahan',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Hubungan Internasional',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Antropologi Sosial',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Sosiologi',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Politik',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Komunikasi',
            'fakultas_id' => '5'
        ]);

        Prodi::create([
            'nama' => 'Sosiatri',
            'fakultas_id' => '5'
        ]);


        // FKIP
        Prodi::create([
            'nama' => 'Pendidikan Bahasa dan Sastra Indonesia',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Bahasa Inggris',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Bahasa Mandarin',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Bimbingan dan Konseling',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Biologi',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Ekonomi',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Fisika',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Anak Usia Dini',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Guru Sekolah Dasar',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Jasmani Kes & Rekreasi',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Kimia',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Matematika',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Seni Tari dan Musik',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Sosiologi',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Pancasila & Kewarganegaraan',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Sejarah',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Geografi',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Kepelatihan Olahraga',
            'fakultas_id' => '6'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan IPS',
            'fakultas_id' => '6'
        ]);

        // Kehutanan
        Prodi::create([
            'nama' => 'Kehutanan',
            'fakultas_id' => '7'
        ]);

        // MIPA
        Prodi::create([
            'nama' => 'Biologi',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Fisika',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Geofisika',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Kelautan',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Kimia',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Matematika',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Sistem Komputer',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Statistik',
            'fakultas_id' => '8'
        ]);

        Prodi::create([
            'nama' => 'Sistem Informasi',
            'fakultas_id' => '8'
        ]);

        // Kedokteran
        Prodi::create([
            'nama' => 'Farmasi',
            'fakultas_id' => '9'
        ]);

        Prodi::create([
            'nama' => 'Pendidikan Dokter',
            'fakultas_id' => '9'
        ]);

        Prodi::create([
            'nama' => 'Ilmu Keperawatan',
            'fakultas_id' => '9'
        ]);

        // SKEMA
        Skema::create([
            'slug' => 'kip',
            'nama' => 'KIP-Kuliah Penuh'
        ]);

        Skema::create([
            'slug' => 'bbp',
            'nama' => 'Bantuan Biaya Pendidikan'
        ]);

        // Status

        Status::create([
            'nama' => 'Mahasiswa Aktif'
        ]);

        Status::create([
            'nama' => 'Diberhentikan'
        ]);

        Status::create([
            'nama' => 'Alumni'
        ]);

        // Periode

        Periode::create([
            'periode' => 'Ganjil 2020/2021'
        ]);

        Periode::create([
            'periode' => 'Genap 2020/2021'
        ]);

        Periode::create([
            'periode' => 'Ganjil 2021/2022'
        ]);

        Periode::create([
            'periode' => 'Genap 2021/2022'
        ]);
    }
}
