<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Webpatser\Uuid\Uuid;
use Carbon\Carbon;
class Leave extends Model
{
    public $incrementing = false;

    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){

            $model->id = (string) Uuid::generate();

        });
    }

    public static function calculateDuration($start_date, $end_date){
        $holidays = Holiday::pluck('holiday_date');
        $excludeWeekends =Carbon::create($start_date)->diffInDaysFiltered(function(Carbon $date) use($holidays){
            foreach($holidays as $holiday){
                $converted_date = Carbon::create($holiday);
                if($date != $converted_date && !$date->isWeekend()){
                    return true;
                }
            }
            
        }, Carbon::create($end_date)) + 1;

        return $excludeWeekends;
    }
    
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function leaveactivities(){

        return $this->hasMany(Leaveactivity::class);
    }

    public function comments(){

        return $this->morphMany('App\Comment', 'commentable');

    }
    public function leavesetting(){
        
        return $this->belongsTo('App\Leavesetting');
    }

    public function financialyear(){

        return $this->belongsTo(Financialyear::class);
    }
}
