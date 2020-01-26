<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance_metrics_details extends Model
{
    public function meatPartone(){
        return $this->belongsTo(Meatpartone::class);
    }
}
