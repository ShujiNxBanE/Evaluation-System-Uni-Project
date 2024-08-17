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
        ];

        DB::Statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_permissions')->truncate();
        DB::table('role_permissions')->insert($role_permissions);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
