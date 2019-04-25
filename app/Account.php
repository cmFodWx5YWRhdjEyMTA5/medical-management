<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [ 'patient_id', 'total_price', 'customer_pay'];
}
