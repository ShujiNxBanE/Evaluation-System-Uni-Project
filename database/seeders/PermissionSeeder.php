<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_detail', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert($permissions);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
