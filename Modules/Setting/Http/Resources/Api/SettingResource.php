<?php

namespace Modules\Setting\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
          'name' => $this->name,
          'img_url' => $this->getFirstMediaUrl(),
          'sections' => SettingSectionResource::collection($this->whenLoaded('Sections')),
        ];
    }
}
