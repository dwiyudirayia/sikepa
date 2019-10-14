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
                'name' => 'Create User',
            ],
            1 => [
                'name' => 'Read User',
            ],
            2 => [
                'name' => 'Update User',
            ],
            3 => [
                'name' => 'Delete User',
            ],
            4 => [
                'name' => 'Create Article',
            ],
            5 => [
                'name' => 'Read Article',
            ],
            6 => [
                'name' => 'Update Article',
            ],
            7 => [
                'name' => 'Delete Article',
            ],
            8 => [
                'name' => 'Publish / Draft Article',
            ],
            9 => [
                'name' => 'Create Page',
            ],
            10 => [
                'name' => 'Read Page',
            ],
            11 => [
                'name' => 'Update Page',
            ],
            12 => [
                'name' => 'Delete Page',
            ],
            13 => [
                'name' => 'Publish / Draft Page',
            ],
            14 => [
                'name' => 'Create Banner',
            ],
            15 => [
                'name' => 'Read Banner',
            ],
            16 => [
                'name' => 'Update Banner',
            ],
            17 => [
                'name' => 'Delete Banner',
            ],
            18 => [
                'name' => 'Create FAQ',
            ],
            19 => [
                'name' => 'Read FAQ',
            ],
            20 => [
                'name' => 'Update FAQ',
            ],
            21 => [
                'name' => 'Delete FAQ',
            ],
            22 => [
                'name' => 'Create Instansi',
            ],
            23 => [
                'name' => 'Read Instansi',
            ],
            24 => [
                'name' => 'Update Instansi',
            ],
            25 => [
                'name' => 'Delete Instansi',
            ],
            26 => [
                'name' => 'Pengajuan'
            ],
            27 => [
                'name' => 'Disposisi Surat'
            ],
            28 => [
                'name' => 'Kepala Bidang'
            ],
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
