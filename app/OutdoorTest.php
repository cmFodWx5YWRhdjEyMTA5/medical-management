<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutdoorTest extends Model
{

    protected $table = 'outdoor_test';

    protected $fillable = ['user_id', 'test_id', 'patient_id', 'serial_no'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
