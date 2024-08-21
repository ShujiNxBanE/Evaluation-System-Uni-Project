<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            //CategorySeeder::class,
            //EvaluationSeeder::class,
            //RoleSeeder::class,
            //PermissionSeeder::class,
            //RolePermissionSeeder::class
        ]);
    }
}
