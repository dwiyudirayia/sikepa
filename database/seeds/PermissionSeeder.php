<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayPermissions = [
            0 => [
                'name' => 'Lihat User'
            ],
            1 => [
                'name' => 'Tambah User'
            ],
            2 => [
                'name' => 'Hapus User'
            ],
            3 => [
                'name' => 'Edit User'
            ],
            4 => [
                'name' => 'Ganti Status User'
            ],
            5 => [
                'name' => 'Admin'
            ],
            6 => [
                'name' => 'Lihat Pengajuan Kerjasama'
            ],
            7 => [
                'name' => 'Pengajuan Kerjasama'
            ],
            8 => [
                'name' => 'Mengatur Role'
            ],
            9 => [
                'name' => 'Mengubah Role User'
            ],
            10 => [
                'name' => 'Monev'
            ],
            11 => [
                'name' => 'Satker Sesmen'
            ],
            12 => [
                'name' => 'Chart Deputi Bidang Partisipasi Masyarakat',
            ],
            13 => [
                'name' => 'Chart Deputi Bidang Kesetaraan Gender',
            ],
            14 => [
                'name' => 'Chart Deputi Bidang Perlindungan Anak'
            ],
            15 => [
                'name' => 'Chart Deputi Perlindungan Hak Perempuan'
            ],
            16 => [
                'name' => 'Chart Deputi Tumbuh Kembang Anak'
            ],
            17 => [
                'name' => 'Tracking'
            ],
            18 => [
                'name' => 'Bagian Kerjasama'
            ]
        ];

        foreach ($arrayPermissions as $key => $value) {
            Permission::create([
                'name' => $value['name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
