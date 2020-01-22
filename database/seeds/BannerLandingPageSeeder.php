<?php

use App\BannerLandingPage;
use Illuminate\Database\Seeder;

class BannerLandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BannerLandingPage::create([
            'created_by' => 1,
            'updated_by' => 1,
            'image_path' => '1577014401/banner-article-2019-12-22-1577014401.png',
        ]);
    }
}
