<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meatpartone extends Model
{
    protected $guarded = [];
    public function performancedimensions(){
        return $this->hasMany(Performance_metrics_details::class);
    }
}
