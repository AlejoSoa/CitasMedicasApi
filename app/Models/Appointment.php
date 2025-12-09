<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_name',
        'doctor_name',
        'date',
        'time',
        'reason',
        'status',

    ];
}
