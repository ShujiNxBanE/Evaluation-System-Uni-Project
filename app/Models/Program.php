<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function institutional_data()
    {
        return $this->hasOne(Institutional_Data::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_program');
    }
}
