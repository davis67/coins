<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'staffId' => $this->staffId,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'mobilePhone' => $this->mobilePhone,
            'alternativePhone' => $this->alternativePhone,
            'team_id' => $this->team->id,
            'team_name' => $this->team->team_name,
            'team_code' => $this->team->team_code,
            "permission_id" => $this->permission->id,
            'reportsTo' => $this->reportsTo,
        ];
    }
}
