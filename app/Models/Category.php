<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    protected static function booted()
    {
        static::created(function ($category) {
            $programs = Program::all();
            foreach ($programs as $program) {
                $program->categories()->attach($category->id);
            }
        });
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'category_program', 'category_id', 'program_id');
    }
}
