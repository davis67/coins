<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class TeamsResource extends JsonResource
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
            "team_id" => $this->id,
            "team_name" => $this->team_name,
            "team_code" => $this->team_code,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
