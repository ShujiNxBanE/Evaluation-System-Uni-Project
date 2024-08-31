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
            ['name' => 'admin_show_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_user', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_program_information', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_program_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_program', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_program', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_program', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_program', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_program', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_categories', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_evaluations', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_evaluation', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_evaluation', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_evaluation', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_evaluation', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_evaluation', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_final_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_evidences', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin_show_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_programs', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_program_information', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_institutional_data', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_institutional_data', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_institutional_data', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_institutional_data', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_final_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_final_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_final_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'show_program_category', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_evidence', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_evidence', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'destroy_evidence', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'create_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'store_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'update_report', 'description' => 'yo', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert($permissions);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
