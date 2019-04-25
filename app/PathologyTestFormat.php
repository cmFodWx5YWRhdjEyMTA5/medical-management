<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PathologyTestFormat extends Model
{
    protected $fillable = ['test_id', 'test_format'];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
