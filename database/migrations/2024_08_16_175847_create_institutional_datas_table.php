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
        Schema::create('institutional_datas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->integer('creation_year', 4);
            $table->string('institution_character');
            $table->integer('program_edition');
            $table->string('web_address');
            $table->string('postal_address');
            $table->string('recognition_resolution');
            $table->integer('current_edition');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_hours');
            $table->integer('total_students');
            $table->integer('total_teaching_staff');
            $table->integer('total_administrative_staff');
            $table->string('certificate');
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_datas');
    }
};
