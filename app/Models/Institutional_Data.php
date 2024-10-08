<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institutional_Data extends Model
{
    use HasFactory;
    protected $table = 'institutional_datas';

    public function program()
    {
        return $this->hasOne(Program::class);
    }   
}
