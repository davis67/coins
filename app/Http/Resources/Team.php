<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class Team extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray([
            "team_name"=>$this->team_name,
            "team_code"=> $this->team_code,
            "team_leader"=>($this->team_leader) ?User::findOrFail($this->team_leader)->name:null,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_by,
        ]);
    }
}
