<?php

namespace Modules\CommonData\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
        'link_button' => $this->link,
        'title' => $this->title,
        'sub_title' => $this->sub_title,
        'button_title' => $this->button_title,
        'img_url' => $this->getFirstMediaUrl(),
      ];
    }
}
