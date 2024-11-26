<?php

namespace App\Http\Resources;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @property Property $resource
*/
class PropertyResource extends JsonResource
{
 
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'options'=>OptionResource::collection($this->whenLoaded('options')->options)
        ];
    }
}
