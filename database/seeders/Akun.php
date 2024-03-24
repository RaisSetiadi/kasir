<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Akun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'rais',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt(value: 'password'),
                'usertype' => 'admin'
            ],
            [
                'name' => 'abdul',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt(value: 'password'),
                'usertype' => 'petugas'
            ],
        ];
        foreach ($data as $key => $d) {
            User::create($d);
        }
    }
}
