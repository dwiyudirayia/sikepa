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
        $arrayRole =
        [
            0 => [
                'name' => 'Bagian Kerja Sama',
            ],
            1 => [
                'name' => 'SESMEN',
            ],
            2 => [
                'name' => 'Menteri',
            ],
            3 => [
                'name' => 'Bagian Hukum',
            ],
            4 => [
                'name' => 'Kepala Biro Perencanaan dan Data',
            ],
            5 => [
                'name' => 'Deputi',
            ],
            6 => [
                'name' => 'Bagian Ortala',
            ]
        ];
        foreach($arrayRole as $key => $value)
        {
            Role::create([
                'name' => $value['name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
