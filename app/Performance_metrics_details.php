<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance_metrics_details extends Model
{
    public function meatpartone(){
        return $this->belongsTo(Meatpartone::class);
    }

    public function assessment(){

        return $this->hasOne(Partoneassessment::class);

    }
}
