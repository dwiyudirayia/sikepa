<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(FrontSeeder::class);
        $this->call(TypeOfCooperationSeeder::class);
        $this->call(MasterSeeder::class);
        $this->call(PhotoLoginSeeder::class);
    }
}
