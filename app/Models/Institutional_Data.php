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

    protected $fillable = [
        'name',
        'country',
        'creation_year',
        'institution_character',
        'program_edition',
        'web_adresss',
        'postal_address',
        'recognition_resolution',
        'start_date',
        'end_date',
        'number_of_hours',
        'total_students',
        'total_teaching_staff',
        'total_administrative_staff',
        'certificate',
        'program_id',
    ];
}
