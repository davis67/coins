<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financialyear extends Model
{
    protected $fillable = ["year", "start_date", "end_date"];

    public function leaves(){

        return $this->hasMany(Leave::class);
    }
}
