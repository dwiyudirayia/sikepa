<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AkunSatkarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array =
        [
            0 => [
                'name' => 'Bagian Kerja Sama',
                'username' => 'bagiankerjasama',
                'email' => 'bagiankerjasama@gmail.com',
                'password' => Hash::make('bagiankerjasama'),
                'jabatan' => 'Bagian Kerja Sama',
            ],
            1 => [
                'name' => 'SESMEN',
                'username' => 'sesmen',
                'email' => 'sesmen@gmail.com',
                'password' => Hash::make('sesmen'),
                'jabatan' => 'SESMEN'
            ],
            2 => [
                'name' => 'Menteri',
                'username' => 'menteri',
                'email' => 'menteri@gmail.com',
                'password' => Hash::make('menteri'),
                'jabatan' => 'Menteri'
            ],
            3 => [
                'name' => 'Bagian Hukum',
                'username' => 'bagianhukum',
                'email' => 'bagianhukum@gmail.com',
                'password' => Hash::make('bagianhukum'),
                'jabatan' => 'Bagian Hukum'
            ],
            4 => [
                'name' => 'Kepala Biro Perencanaan dan Data',
                'username' => 'kepalabiro',
                'email' => 'kepalabiro@gmail.com',
                'password' => Hash::make('kepalabiro'),
                'jabatan' => 'Kepala Biro Perencanaan dan Data'
            ],
            5 => [
                'name' => 'Deputi',
                'username' => 'deputi',
                'email' => 'deputi@gmail.com',
                'password' => Hash::make('deputi'),
                'jabatan' => 'Deputi'
            ],
            6 => [
                'name' => 'Bagian Ortala',
                'username' => 'bagianortala',
                'email' => 'bagianortala@gmail.com',
                'password' => Hash::make('bagianortala'),
                'jabatan' => 'Bagian Ortala'
            ],
        ];
        foreach($array as $key => $value)
        {
            $user = User::create([
                'name' => $value['name'],
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => $value['password'],
                'jabatan' => $value['jabatan']
            ]);

            $user->assignRole($value['name']);
        }
    }
}
