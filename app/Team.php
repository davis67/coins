<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['team_name', 'team_code', 'created_by', 'updated_by'];

    public function users()
    {

        return $this->hasMany('App\User');
    }

    public function leader()
    {

        return $this->belongsTo('App\User')->join('teams', 'teams.team_leader', '=', 'users.id');
    }

    public function targets()
    {

        return $this->belongsToMany('App\Target');
    }

    public function opportunities()
    {

        return $this->hasMany('App\Opportunity');
    }
}
