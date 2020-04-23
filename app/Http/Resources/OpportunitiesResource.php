<?php

namespace App\Http\Resources;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OpportunitiesResource extends JsonResource
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
            "om_number" => 'OM-' . $this->om_number,
            "opportunity_name" => $this->opportunity_name,
            "clients_name" => $this->clients_name,
            "country" => $this->country,
            "funder" => $this->funder,
            "type" => $this->type,
            "sales_stage" => $this->sales_stage,
            "revenue" => $this->revenue,
            "team" => new TeamsResource($this->team),
            "consultants" => $this->consultants ? new UsersCollection($this->consultants) : null,
            "documents" => $this->documents ? $this->documents : null,
            "lead_source" => $this->lead_source,
            "internal_deadline" => Carbon::parse($this->internal_deadline)->format('l, jS F Y'),
            "original_internal_deadline" => $this->internal_deadline,
            "external_deadline" => Carbon::parse($this->external_deadline)->format('l, jS F Y'),
            "original_external_deadline" => $this->external_deadline,
            "creator" => $this->creator->name
        ];
    }
}
