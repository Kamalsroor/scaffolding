<?php

namespace Modules\CommonData\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
        'title' => $this->title,
        'description' => $this->description,
        'img_url' => $this->getFirstMediaUrl(),
      ];
    }
}
