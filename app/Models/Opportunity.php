<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;
use App\User;

class Opportunity extends Model
{

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'opportunity_name',
        'om_number',
        'country',
        'revenue',
        'type',
        'clients_name',
        'lead_source',
        'sales_stage',
        'external_deadline',
        'internal_deadline',
        'team_id',
        'funder',
        'created_by',
        'updated_by',
        'team_id'
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
            $model->om_number = self::latestOM() + 1;
        });
    }

     /**
     * Fetch the last OM Number of an opportunity.
     *
     * @return String
     */

    public static function latestOM()
    {

        $last = DB::table('opportunities')->latest('om_number')->first();

        if ($last == NULL) {

            $latest = 9500;
        } else {

            $latest = $last->om_number;
        }

        return $latest;
    }

    /**
	 * Get all consultants assigned to an opportunity.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
    public function consultants(){

        return $this->belongsToMany(
            'App\User',
             'consultant_opportunity')
             ->withTimestamps();
    }

     /**
     * Assign a consultant tan opportunity.
     *
     * @param  string $body
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function assignConsultant($user)
    {
        return $this->consultants()->attach($user);
    }

    public function project()
    {

        return $this->hasOne('App\Project');
    }

    public function scores()
    {

        return $this->hasMany('App\Score');
    }

     /**
     * The creator of the opportunity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }

     /**
     *  The path to the opportunity.
     *
     * @return string
     */
    public function path()
    {
        return "/opportunities/{$this->id}";
    }

    public function timesheets()
    {

        return $this->belongsToMany('App\TaskUser');
    }

    public function contact()
    {

        return $this->belongsTo('App\Contact');
    }

    public function team()
    {

        return $this->belongsTo('App\Models\Team');
    }

    public function documents()
    {

        return $this->hasMany('App\Document');
    }

    public function comments()
    {

        return $this->morphMany('App\Comment', 'commentable');
    }

    public function evaluations()
    {

        return $this->morphMany('App\Evaluation', 'evaluationable');
    }

    public function deliverables()
    {

        return $this->belongsToMany('App\Deliverable')->withPivot('deliverable_status', 'deliverable_completion');
    }

    /**
     * gets all Employees.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return static::oldest('opportunity_name')->get()->keyBy('id');
    }
}
