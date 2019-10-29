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
                'name' => 'Biro Perencanaan & Data'
            ],
            3 => [
                'name' => 'Deputi'
            ],
            4 => [
                'name' => 'Hapus User'
            ],
            5 => [
                'name' => 'Edit User'
            ],
            6 => [
                'name' => 'Ganti Status User'
            ],
            7 => [
                'name' => 'Admin'
            ],
            8 => [
                'name' => 'Sesmen'
            ],
            9 => [
                'name' => 'Pengajuan Kerjasama'
            ],
            10 => [
                'name' => 'Mengatur Role'
            ],
            11 => [
                'name' => 'Mengatur Role User'
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
