<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Muthia',
                'jk' => 'Perempuan',
                'alamat' => 'Bantul',
                'no_telp' => '089867823331',
                'email' => 'admin@muthiaamesthi',
                'is_admin' => 1,
                'password' => bcrypt('muthia'),
                'role' => 'admin',
            ],
            [
                'name' => 'Kireina',
                'jk' => 'Perempuan',
                'alamat' => 'Yogyakarta',
                'no_telp' => '082766627741',
                'email' => 'pegawai@kireinahana',
                'is_admin' => 0,
                'password' => bcrypt('hana'),
                'role' => 'pegawai',
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
