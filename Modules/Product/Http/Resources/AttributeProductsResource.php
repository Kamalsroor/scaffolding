<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        return [
          'id' => $this->id,
          'have_child' => $this->have_child,
          'parent' =>  !$this->have_child ? new AttributeResource($this->whenLoaded('parent')) : null,
          'sub_attributes' =>  $this->have_child ? AttributeResource::collection($this->whenLoaded('subAttribute')) : null,
          'name' => $this->name,
          'value' =>  json_decode($this->pivot->value , true),
        ];
    }
}
