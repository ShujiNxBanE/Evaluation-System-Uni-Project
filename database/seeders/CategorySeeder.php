<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{

    protected $categories = [
        ['name' => 'Apoyo Institucional', 'description' => ''],
        ['name' => 'Apoyo Tecnológico', 'description' => ''],
        ['name' => 'Desarrollo y Diseño Intruccional de los programas en línea', 'description' => ''],
        ['name' => 'Estructura del programa en línea', 'description' => ''],
        ['name' => 'Enseñanza y aprendizaje', 'description' => ''],
        ['name' => 'Participación Social y Estudiantil', 'description' => ''],
        ['name' => 'Apoyo a los docentes', 'description' => ''],
        ['name' => 'Apoyo a los alumnos', 'description' => ''],
        ['name' => 'Evaluación y Valoración', 'description' => ''],
    ];

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::table('categories')->insert(
            array_map(function ($category) {
                return [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ];
            }, $this->categories));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
