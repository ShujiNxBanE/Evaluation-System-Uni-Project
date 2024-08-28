<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
