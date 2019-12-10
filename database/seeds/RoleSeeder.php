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
                'name' => 'Biro Perencanaan dan Data',
            ],
            2 => [
                'name' => 'Deputi Bidang Partisipasi Masyarakat'
            ],
            3 => [
                'name' => 'Deputi Bidang Kesetaraan Gender'
            ],
            4 => [
                'name' => 'Deputi Bidang Perlindungan Anak',
            ],
            5 => [
                'name' => 'Deputi Bidang Perlindungan Hak Perempuan'
            ],
            6 => [
                'name' => 'Deputi Bidang Tumbuh Kembang Anak'
            ],
            7 => [
                'name' => 'Satker Sesmen'
            ],
            8 => [
                'name' => 'Bagian Kerja Sama',
            ],
            9 => [
                'name' => 'Bagian Ortala'
            ],
            10 => [
                'name' => 'Sesmen',
            ],
            11 => [
                'name' => 'Menteri'
            ],
            12 => [
                'name' => 'Hukum'
            ],
            13 => [
                'name' => 'Sesmen Final',
            ],
            14 => [
                'name' => 'Menteri Final'
            ],
            15 => [
                'name' => 'Bagian Kerja Sama Final'
            ]
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
