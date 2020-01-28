<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
class Performancedimension extends JsonResource
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
            'id'=>$this->id,
            'description'=>$this->description,
            'measurement'=>$this->measurement,
            'target_performance'=>$this->target_performance,
            "assessment" => $this->assessment,
            'meatpartone_id'=>$this->meatpartone_id
        ];
    }
}
