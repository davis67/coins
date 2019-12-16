<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class Opportunity extends JsonResource
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
            "om_number" => $this->om_number,
            "opportunity_name" => $this->opportunity_name,
            "clients_name" =>$this->clients_name,
            "country" => $this->country,
            "funder" => $this->funder,
            "type" => $this->type,
            "sales_stage" =>$this->sales_stage,
            "revenue" => $this->revenue,
            "team_code" => $this->team->team_code,
            "team_name" => $this->team->team_name,
            "lead_source" =>$this->lead_source,
            "internal_deadline" =>$this->internal_deadline,
            "external_deadline" => $this->external_deadline,
            "created_by" =>User::findOrFail($this->created_by)->name
        ];
    }
}
