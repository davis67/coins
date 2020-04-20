<?php

namespace App;

use App\Models\Opportunity;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class User extends Authenticatable
{

    // use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'staffId',
        'name',
        'gender',
        'email',
        'mobilePhone',
        'password',
        'alternativePhone',
        'team_id',
        'title_id',
        'reportsTo',
        'userStatus'
    ];

    /**
     * The ID attribute should be a string
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The ID should not increment
     * @var string
     *
     */
    public $incrementing = false;

    /**
     * The ID should be the primary key
     * @var string
     *
     */
    protected $primary_key = 'id';

    /**
     * The attributes that should be cast to native types
     * @var string
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Hook the UUID as ID attribute during the creation process of the model
     */

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->password = "secret";
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getCreator()
    {

        $admin = DB::table('users')->latest('id')->first();

        if ($admin != NULL) {

            $admin = $admin->id;
        } else {
        }

        return $admin;
    }


    /**
     * Get all opportunities assigned to an consultant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function assignedOpportinities()
    {

        return $this->belongsToMany(
            'App\Models\Opportunity',
            'consultant_opportunity'
        )
            ->withTimestamps();
    }


    public function tasks()
    {

        return $this->belongsToMany('App\Task')->where('task_status', '!=', 'Done')->orWhere('task_status', '!=', 'Completed');
    }

    public function doneTasks()
    {
        return $this->belongsToMany('App\Task')->where('task_status', 'Done')->orWhere('task_status', 'Completed');
    }
    public function timesheets()
    {

        return $this->hasMany('App\Timesheet');
    }
    public function comments()
    {

        return $this->hasMany('App\Comment');
    }

    public function permission()
    {
        return $this->hasOne(Permission::class);
    }

    public function assessments()
    {

        return $this->hasMany('App\Assessment')->selectRaw("targets.target_category AS category,assessments.assessment_score/targets.target_value*100 AS score")
            ->join('targets', 'assessments.target_id', '=', 'targets.id')
            ->where(['targets.assessable' => true])
            ->groupBy('targets.target_category');
    }

    public function scores()
    {

        return $this->hasMany('App\TaskUser')->selectRaw("targets.target_category AS category,assessments.assessment_score/targets.target_value*100 AS grade")
            ->join('targets', 'assessments.target_id', '=', 'targets.id')
            ->where(['targets.assessable' => false])
            ->groupBy('targets.target_category');
    }

    public function projects()
    {

        return $this->belongsToMany('App\Project');
    }

    public function leaves()
    {

        return $this->hasMany('App\Leave');
    }

    public function reportsTo()
    {
        return $this->hasMany(User::class, 'reportsTo');
    }

    public function titles()
    {

        return $this->belongsToMany('App\Title');
    }

    public function leavestatus()
    {

        return $this->hasMany(Leavestatus::class, 'approved_by');
    }

    /**
     * Get all opportunities created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function team()
    {

        return $this->belongsTo('App\Models\Team');
    }

    public function leads()
    {

        return $this->hasOne('App\Team')->join('users', 'users.id', '=', 'teams.team_leader');
    }

    public function level()
    {

        return $this->belongsTo('App\Level');
    }

    /**
     * Get all opportunities created by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'created_by')
            ->latest('updated_at');
    }

    // public function approvedUsers()
    // {
    //     return $this->hasMany('App\Opportunity')->where('approved', 1)->orderBy('email');
    // }

    //actual function that checks whther the user has a title from a specified array of titles.This function will be usedd in the middleware to check if a user is authorised to perform a certain task.
    // public function hasAnyTitles($titles)
    // {
    //     if (is_array($titles)) {
    //         foreach ($titles as $title) {
    //             if ($this->hasRole($title)) {
    //                 return true;
    //             }

    //             return false;
    //         }
    //     }
    // }

    //function that checks whether the user has acertain title.
    public function hasTitle($title)
    {

        //check if the user has the title stated in the arguments
        if ($this->titles()->where('name', $title)->first()) {
            return true;
        }

        //return false if the user has no the title stated in the arguments
        return false;
    }
}
