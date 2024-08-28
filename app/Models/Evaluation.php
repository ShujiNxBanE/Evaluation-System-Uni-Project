<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
