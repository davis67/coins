<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partoneassessment extends Model
{
    protected $guarded = [];

    public function dimension(){
        return $this->belongsTo(Performance_metrics_details::class);
    }
}
