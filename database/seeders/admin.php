<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'role' => 'Petugas',
            'password' => bcrypt('petugas123'),
        ]);
    }
}