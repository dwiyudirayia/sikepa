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
            'image_path' => '1/5.jpg',
        ])
    }
}
