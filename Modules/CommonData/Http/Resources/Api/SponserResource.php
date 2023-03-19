<?php

namespace Modules\CommonData\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SponserResource extends JsonResource
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
        'is_feature' => $this->is_feature,
        'name' => $this->name,
        'img_url' => $this->getFirstMediaUrl(),
      ];
    }
}
