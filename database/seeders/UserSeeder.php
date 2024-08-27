<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin2024#@portfolio.com',
                'password' => bcrypt('2024-administrador*'),
                'role_id' => 1,
            ],
            [
                'name' => 'testUser',
                'email' => 'testUser@portfolio.com',
                'password' => bcrypt('testUser2024'),
                'role_id' => 2,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
