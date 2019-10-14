<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = ['Create User', 'Read User', 'Update User', 'Delete User', 'Create Article', 'Read Article', 'Update Article', 'Delete Article', 'Publish / Draft Article', 'Create Page', 'Read Page', 'Update Page', 'Delete Page', 'Publish / Draft Page', 'Create Banner','Read Banner','Update Banner','Delete Banner','Create FAQ','Read FAQ','Update FAQ','Delete FAQ','Create Instansi','Read Instansi','Update Instansi','Delete Instansi'];

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'jabatan' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->givePermissionTo($permission);
    }
}
