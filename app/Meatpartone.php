<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meatpartone extends Model
{
    public function performance_dimensions(){
        return $this->hasMany("App\Performance_metrics_details");
    }
}
