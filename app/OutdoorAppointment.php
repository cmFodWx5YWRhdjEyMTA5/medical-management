<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutdoorAppointment extends Model
{
    protected $fillable = [
        'patient_name', 'age', 'gender', 'phone', 'address', 'purpose_id',
        'doctor_id', 'appointment_date'
    ];

    public function purpose()
    {
        return $this->belongsTo(AppointmentPurpose::class, 'purpose_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'user_id');
    }
}
