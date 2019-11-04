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
