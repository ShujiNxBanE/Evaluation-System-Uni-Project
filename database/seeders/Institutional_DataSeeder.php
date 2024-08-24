<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Institutional_DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('institutional_datas')->truncate();
        DB::table('institutional_datas')->insert([
            [
                'name' => '',
                'country' => '',
                'creation_year' => 0,
                'institution_character' => 'no hay',
                'program_edition' => 0,
                'web_adresss' => 'no hay',
                'postal_address' => 'no hay',
                'recognition_resolution' => 'no hay',
                'start_date' => '2024-09-02',
                'end_date' => '2024-09-02',
                'number_of_hours' => 0,
                'total_students' => 0,
                'total_teaching_staff' => 0,
                'total_administrative_staff' => 0,
                'certificate' => 'no hay',
                'program_id' => 1,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
