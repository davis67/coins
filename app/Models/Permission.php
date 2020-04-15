<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable =["canCreateOpportunity","canEditOpportunity","canIndexOpportunity","canDeleteOpportunity","canCreateContact","canEditContact","canIndexContact","canDeleteContact"];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
