<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('programs')->truncate();
        DB::table('programs')->insert([
            [
                'name' => 'programa de prueba',
                'description' => 'no hay',
                'user_id' => 1,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
