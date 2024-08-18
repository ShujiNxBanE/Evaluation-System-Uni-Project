<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
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
        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        UserFactory::new()->count(10)->create();
        UserFactory::new()->create([
           'role_id' => 1,
        ]);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
