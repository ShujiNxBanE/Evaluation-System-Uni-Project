<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_program = [
            ['program_id' => 1, 'category_id' => 1],
            ['program_id' => 1, 'category_id' => 2],
            ['program_id' => 1, 'category_id' => 3],
            ['program_id' => 1, 'category_id' => 4],
            ['program_id' => 1, 'category_id' => 5],
            ['program_id' => 1, 'category_id' => 6],
            ['program_id' => 1, 'category_id' => 7],
            ['program_id' => 1, 'category_id' => 8],
            ['program_id' => 1, 'category_id' => 9],
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category_program')->truncate();
        DB::table('category_program')->insert($category_program);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
