<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutdoorAppointment extends Model
{
    protected $fillable = [
        'patient_name', 'age', 'gender', 'phone', 'address', 'purpose_id',
        'doctor_id', 'appointment_date'
    ];
}
