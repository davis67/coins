<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance_metrics_details extends Model
{
    public function meat_part_one(){
        return $this->belongsTo("App\Meatpartone");
    }
}
