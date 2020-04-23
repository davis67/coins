<?php

namespace App;

use App\Models\Document;
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

    /**
     * Get all the activities triggered by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(User::class);
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

    /**
     * The user associated with the documents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(Document::class, 'user_id');
    }
}
