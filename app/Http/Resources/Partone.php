<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Meatpartone;
use App\Http\Resources\Performancedimension as PerformancedimensionResource;
class Partone extends JsonResource
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
            'id'=> $this->id,
            'partone' =>$this->part,
            'performance_dimensions' => PerformancedimensionResource::collection($this->performanceDimensions),
            'performance_dimension' => $this->performance_dimension,
            'weight' => $this->weight
        ];
    }
}
