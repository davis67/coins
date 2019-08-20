<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){

            $model->id = (string) Uuid::generate();

        });
    }

    public static function getCreator(){

        $admin = DB::table('users')->latest('id')->first();

        if ($admin!=NULL) {

            $admin = $admin->id;

        } else {

        }

        return $admin;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks(){

        return $this->belongsToMany('App\Task')->where('task_status','!=','Done')->orWhere('task_status','!=','Completed');

    }
    
    public function doneTasks(){
        return $this->belongsToMany('App\Task')->where('task_status','Done')->orWhere('task_status','Completed');

    }
    public function timesheets(){

        return $this->hasMany('App\Timesheet');

    }
    public function comments(){

        return $this->hasMany('App\Comment');

    }
    public function assessments(){

        return $this->hasMany('App\Assessment')->selectRaw("targets.target_category AS category,assessments.assessment_score/targets.target_value*100 AS score")
                                                ->join('targets', 'assessments.target_id', '=', 'targets.id')
                                                ->where(['targets.assessable' => true])
                                                ->groupBy('targets.target_category');
    }

    public function scores(){

        return $this->hasMany('App\TaskUser')->selectRaw("targets.target_category AS category,assessments.assessment_score/targets.target_value*100 AS grade")
                                                ->join('targets', 'assessments.target_id', '=', 'targets.id')
                                                ->where(['targets.assessable' => false])
                                                ->groupBy('targets.target_category');
    }

    public function projects(){

        return $this->belongsToMany('App\Project');

    }

    public function leaves(){

        return $this->hasMany('App\Leave');

    }

    public function titles(){

        return $this->belongsToMany('App\Title');

    }

    public function team(){

        return $this->belongsTo('App\Team')->withDefault(['id' =>1]);

    }

    public function leads(){

        return $this->hasOne('App\Team')->join('users','users.id','=','teams.team_leader');

    }

    public function level(){

        return $this->belongsTo('App\Level');

    }

    public function opportunities(){

        return $this->belongsToMany('App\Opportunity');

    }
    public function approvedUsers() {
        return $this->hasMany('App\Opportunity')->where('approved', 1)->orderBy('email');
    }

    //actual function that checks whther the user has a title from a specified array of titles.This function will be usedd in the middleware to check if a user is authorised to perform a certain task.
    public function hasAnyTitles($titles){
        if(is_array($titles)){
            foreach($titles as $title){
                if($this->hasRole($title)){
                    return true;
                }

                return false;
            }
        }
    }

    //function that checks whether the user has acertain title.
    public function hasTitle($title){

        //check if the user has the title stated in the arguments
        if($this->titles()->where('name', $title)-> first()){
            return true;
        }

        //return false if the user has no the title stated in the arguments
        return false;
    }
}

