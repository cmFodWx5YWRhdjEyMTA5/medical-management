<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id', 'name', 'age', 'sex', 
        'refer_by_outdoor_dr', 
        'refer_by_other', 'phone', 'address'
    ];

    public function outdoortests()
    {
        return $this->hasMany(OutdoorTest::class, 'patient_id');
    }
    
    public function account()
    {
        return $this->hasOne(Account::class);
    }
}
