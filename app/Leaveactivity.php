<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaveactivity extends Model
{
    protected $guarded = [];

    public function leave(){

        return $this->belongsTo(Leave::class);
    }
}
