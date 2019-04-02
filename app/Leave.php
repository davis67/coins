<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Webpatser\Uuid\Uuid;

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
    
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function comments(){

        return $this->morphMany('App\Comment', 'commentable');

    }
    public function leavesetting(){
        
        return $this->belongsTo('App\Leavesetting');
    }
}
