<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRoles = [
            0 => [
                'name' => 'Admin'
            ],
            1 => [
                'name' => 'Satker'
            ],
            2 => [
                'name' => 'Biro Perencanaan dan Data',
            ],
            3 => [
                'name' => 'Deputi Terkait'
            ],
            4 => [
                'name' => 'Bagian Kerja Sama',
            ],
            5 => [
                'name' => 'Bagian Ortala'
            ],
            6 => [
                'name' => 'Sesmen',
            ],
            7 => [
                'name' => 'Menteri'
            ],
            8 => [
                'name' => 'Hukum'
            ],
        ];

        foreach ($arrayRoles as $key => $value) {
            Role::create([
                'name' => $value['name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
