<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meatpartone extends Model
{
    protected $guarded = [];
    public function performanceDimensions(){
        return $this->hasMany(Performance_metrics_details::class);
    }
}
