<?php

use App\PhotoLogin;
use Illuminate\Database\Seeder;

class PhotoLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhotoLogin::create([
            'created_by' => 1,
            'updated_by' => 1,
            'image_path' => '1577014401/photo-login-2019-12-22-1577014401.png',
        ]);
    }
}
