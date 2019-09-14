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
