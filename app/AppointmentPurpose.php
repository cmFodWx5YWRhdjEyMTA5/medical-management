<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentPurpose extends Model
{
    protected $fillable = ['purpose', 'description'];
}
