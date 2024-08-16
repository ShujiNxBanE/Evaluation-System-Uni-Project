<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutional_data', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('country', 50);
            $table->integer('creation_year');
            $table->string('institution_character', 25);
            $table->integer('program_edition');
            $table->string('web_adresss');
            $table->string('postal_address');
            $table->string('recognition_resolution');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_hours');
            $table->integer('total_teaching_staff');
            $table->integer('total_administrative_staff');
            $table->string('certificate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_data');
    }
};
