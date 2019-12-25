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
        $permissionAdmin = ['Lihat User', 'Tambah User', 'Hapus User', 'Edit User', 'Admin', 'Ganti Status User', 'Mengubah Role User', 'Mengatur Role'];
        $permissionSatkerDeputi = ['Lihat Pengajuan Kerjasama','Monev'];
        $permissionBagianKerjasama = ['Lihat Pengajuan Kerjasama','Monev'];
        $permissionSatkerSesmen = ['Lihat Pengajuan Kerjasama','Pengajuan Kerjasama', 'Satker Sesmen'];
        $permissionOtherRoles = ['Lihat Pengajuan Kerjasama'];

        $roleAdmin = Role::find(1); //AMBIL ROLE BERDASARKAN ID
        $roleAdmin->syncPermissions($permissionAdmin); //SET PERMISSION UNTUK ROLE TERSEBUT

        $roleBPD = Role::find(2);
        $roleBPD->syncPermissions($permissionOtherRoles); //SET PERMISSION UNTUK ROLE TERSEBUT

        $roleBPD = Role::find(9);
        $roleBPD->syncPermissions($permissionBagianKerjasama); //SET PERMISSION UNTUK ROLE TERSEBUT

        for ($i=3; $i <= 7; $i++) {
            $roleSatkerDeputi = Role::find($i); //AMBIL ROLE BERDASARKAN ID
            $roleSatkerDeputi->syncPermissions($permissionSatkerDeputi); //SET PERMISSION UNTUK ROLE TERSEBUT
        }

        $roleSatkerSesmen = Role::find(8);
        $roleSatkerSesmen->syncPermissions($permissionSatkerSesmen);

        for ($x=10; $x <= 16; $x++) {
            $roleSatkerDeputi = Role::find($x); //AMBIL ROLE BERDASARKAN ID
            $roleSatkerDeputi->syncPermissions($permissionOtherRoles); //SET PERMISSION UNTUK ROLE TERSEBUT
        }

        $account = [
            0 => [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => 'admin',
                'photo' => 'admin/default.png',
                'jabatan' => 'Admin',
                'email' => 'admin@gmail.com',
                'roles' => ['Admin']
            ],
            1 => [
                'name' => 'Deputi Bidang Partisipasi Masyarakat',
                'username' => 'deputibidangpartisipasimasyarakat',
                'password' => 'deputibidangpartisipasimasyarakat',
                'photo' => 'deputibidangpartisipasimasyarakat/default.png',
                'jabatan' => 'Deputi Bidang Partisipasi Masyarakat',
                'email' => 'deputibidangpartisipasimasyarakat@gmail.com',
                'roles' => ['Deputi Bidang Partisipasi Masyarakat']
            ],
            2 => [
                'name' => 'Deputi Bidang Kesetaraan Gender',
                'username' => 'deputibidangkesetaraangender',
                'password' => 'deputibidangkesetaraangender',
                'photo' => 'deputibidangkesetaraangender/default.png',
                'jabatan' => 'Deputi Bidang Kesetaraan Gender',
                'email' => 'deputibidangkesetaraangender@gmail.com',
                'roles' => ['Deputi Bidang Kesetaraan Gender']
            ],
            3 => [
                'name' => 'Deputi Bidang Perlindungan Anak',
                'username' => 'deputibidangperlindungananak',
                'password' => 'deputibidangperlindungananak',
                'photo' => 'deputibidangperlindungananak/default.png',
                'jabatan' => 'Deputi Bidang Perlindungan Anak',
                'email' => 'deputibidangperlindungananak@gmail.com',
                'roles' => ['Deputi Bidang Perlindungan Anak'],
            ],
            4 => [
                'name' => 'Deputi Bidang Perlindungan Hak Perempuan',
                'username' => 'deputibidangperlindunganhakperempuan',
                'password' => 'deputibidangperlindunganhakperempuan',
                'photo' => 'deputibidangperlindunganhakperempuan/default.png',
                'jabatan' => 'Deputi Bidang Perlindungan Hak Perempuan',
                'email' => 'deputibidangperlindunganhakperempuan@gmail.com',
                'roles' => ['Deputi Bidang Perlindungan Hak Perempuan']
            ],
            5 => [
                'name' => 'Deputi Bidang Tumbuh Kembang Anak',
                'username' => 'deputibidangtumbuhkembanganak',
                'password' => 'deputibidangtumbuhkembanganak',
                'photo' => 'deputibidangtumbuhkembanganak/default.png',
                'jabatan' => 'Deputi Bidang Tumbuh Kembang Anak',
                'email' => 'deputibidangtumbuhkembanganak@gmail.com',
                'roles' => ['Deputi Bidang Tumbuh Kembang Anak']
            ],
            6 => [
                'name' => 'Satker Sesmen',
                'username' => 'satkersesmen',
                'password' => 'satkersesmen',
                'photo' => 'satkersesmen/default.png',
                'jabatan' => 'Satker Sesmen',
                'email' => 'satkersesmen@gmail.com',
                'roles' => ['Satker Sesmen'],
            ],
            7 => [
                'name' => 'Biro Perencanaan dan Data',
                'username' => 'biroperencanaandandata',
                'password' => 'biroperencanaandandata',
                'photo' => 'biroperencanaandandata/default.png',
                'jabatan' => 'Biro Perencanaan dan Data',
                'email' => 'biroperencanaandandata@gmail.com',
                'roles' => ['Biro Perencanaan dan Data'],
            ],
            8 => [
                'name' => 'Bagian Kerja Sama',
                'username' => 'bagiankerjasama',
                'password' => 'bagiankerjasama',
                'photo' => 'bagiankerjasama/default.png',
                'jabatan' => 'Bagian Kerja Sama',
                'email' => 'bagiankerjasama@gmail.com',
                'roles' => ['Bagian Kerja Sama', 'Bagian Kerja Sama Final'],
            ],
            9 => [
                'name' => 'Bagian Ortala',
                'username' => 'bagianortala',
                'password' => 'bagianortala',
                'photo' => 'bagianortala/default.png',
                'jabatan' => 'Bagian Ortala',
                'email' => 'bagianortala@gmail.com',
                'roles' => ['Bagian Ortala']
            ],
            10 => [
                'name' => 'Sesmen',
                'username' => 'sesmen',
                'password' => 'sesmen',
                'photo' => 'sesmen/default.png',
                'jabatan' => 'Sesmen',
                'email' => 'sesmen@gmail.com',
                'roles' => ['Sesmen', 'Sesmen Final']
            ],
            11 => [
                'name' => 'Menteri',
                'username' => 'menteri',
                'password' => 'menteri',
                'photo' => 'menteri/default.png',
                'jabatan' => 'Menteri',
                'email' => 'menteri@gmail.com',
                'roles' => ['Menteri', 'Menteri Final']
            ],
            12 => [
                'name' => 'Hukum',
                'username' => 'hukum',
                'password' => 'hukum',
                'photo' => 'hukum/default.png',
                'jabatan' => 'Hukum',
                'email' => 'hukum@gmail.com',
                'roles' => ['Hukum']
            ]
        ];
        foreach ($account as $key => $value) {
            $user = User::create([
                'name' => $value['name'],
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => Hash::make($value['password']),
                'jabatan' => $value['jabatan'],
                'photo' => $value['photo'],
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $user->syncRoles($value['roles']);
        }
        $assignRole = User::findOrFail(1);
        $assignRole->assignRole('Admin');
    }
}
