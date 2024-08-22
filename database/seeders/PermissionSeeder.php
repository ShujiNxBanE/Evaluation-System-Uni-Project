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
            ['name' => 'create_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_admin_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_detail_admin_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_admin_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_detail_admin_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert($permissions);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
