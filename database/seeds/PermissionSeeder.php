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
        $arrayPermission = [
            0 => [
                'name' => 'Satker',
            ],
            1 => [
                'name' => 'Akun Bagian',
            ],
            2 => [
                'name' => 'Biro Hukum'
            ],
            3 => [
                'name' => 'Sesmen',
            ],
            4 => [
                'name' => 'Admin',
            ],
            5 => [
                'name' => 'Hapus User'
            ],
            6 => [
                'name' => 'Edit User'
            ],
            7 => [
                'name' => 'Ganti Status User'
            ]
        ];

        foreach ($arrayPermission as $key => $value) {
            Permission::create([
                'name' => $value['name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
