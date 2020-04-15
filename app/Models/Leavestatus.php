<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leavestatus extends Model
{
 protected $guarded = [];

 //inverse relationship btn the leavestatus and leave

 public function leave(){
     return $this->belongsTo(Leave::class);
 }

 //relationship btn leave and leavestatus
 public function approvedBy(){
     return $this->belongsTo(User::class);
 }
}
