<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = ['Lihat User', 'Tambah User', 'Hapus User', 'Edit User', 'Admin', 'Ganti Status User'];

        $role = Role::find(1); //AMBIL ROLE BERDASARKAN ID
        $role->syncPermissions($permission); //SET PERMISSION UNTUK ROLE TERSEBUT

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'jabatan' => 'Admin',
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $assignRole = User::findOrFail(1);
        $assignRole->assignRole('Admin');
    }
}
