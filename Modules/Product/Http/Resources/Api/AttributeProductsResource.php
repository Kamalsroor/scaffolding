<?php

namespace Modules\Product\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Http\Resources\AttributeResource;

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
        $value =  json_decode($this->pivot->value, true);

        return [
          'id' => $this->id,
          'have_child' => $this->have_child,
          'parent' =>  !$this->have_child ? new AttributeResource($this->whenLoaded('parent')) : null,
          'sub_attributes' =>  $this->have_child ? AttributeResource::collection($this->whenLoaded('subAttribute')) : null,
          'name' => $this->name,
          'value' =>  isset($value[app()->currentLocale()]) ? $value[app()->currentLocale()] : reset($value)
        ];
    }
}
