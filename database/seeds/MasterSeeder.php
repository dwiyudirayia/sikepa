<?php

use App\Agency;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::create([
            'created_by' => 1,
            'updated_by' => 1,
            'name' => 'Kementerian',
        ]);
    }
}
