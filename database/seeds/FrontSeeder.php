<?php

use App\CategoryPage;
use App\SectionPage;
use Illuminate\Database\Seeder;

class FrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = SectionPage::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Informasi'
        ]);

        $category = CategoryPage::create([
            'created_by' => 1,
            'updated_by' => 1,
            'section_id' => $section->id,
            'name' => 'Deputi & Sesmen'
        ]);
    }
}
