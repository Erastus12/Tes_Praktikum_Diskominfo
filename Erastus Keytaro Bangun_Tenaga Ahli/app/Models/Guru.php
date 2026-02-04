<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'mata_pelajaran',
        'pendidikan',
        'status',
        'years_experience',
        'trainings_completed',
        'eligibility_override',
        'eligibility_note',
    ];
}
