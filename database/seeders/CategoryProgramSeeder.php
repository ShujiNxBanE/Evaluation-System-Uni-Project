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
            ['program_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['program_id' => 1, 'category_id' => 9, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category_program')->truncate();
        DB::table('category_program')->insert($category_program);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
