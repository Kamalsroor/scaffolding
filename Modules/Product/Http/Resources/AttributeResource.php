<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
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
          'active' => $this->active ? true : false,
          'have_child' => $this->have_child ? true : false,
          'order_id' => $this->order_id,
          'parent_id' => $this->parent_id,
          'parent' =>  $this->parent_id != 0 ? new AttributeResource($this->whenLoaded('parent')) : null,
          'subAttribute' =>  $this->parent_id == 0 ? AttributeResource::collection($this->whenLoaded('subAttribute')) : null,
          'name' => $this->getTranslationsArrayByKey('name'),
          'deleted' => isset($this->deleted_at),
          'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
