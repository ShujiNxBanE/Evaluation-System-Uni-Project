<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_permissions = [
            ['role_id' => 1, 'permission_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 16, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 18, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 19, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 21, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 22, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 23, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 24, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 26, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 27, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 28, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 29, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 31, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 32, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 33, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 34, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 35, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 36, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 37, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 38, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 39, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 41, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 42, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 43, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 44, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 45, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'permission_id' => 46, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_permissions')->truncate();
        DB::table('role_permissions')->insert($role_permissions);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
