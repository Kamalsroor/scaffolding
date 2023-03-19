<?php

namespace Modules\CommonData\Http\Resources;

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
            'active' => $this->active ? true : false,
            'order_id' => $this->order_id,
            'link' => $this->link,
            'title' => $this->getTranslationsArrayByKey('title'),
            'sub_title' => $this->getTranslationsArrayByKey('sub_title'),
            'button_title' => $this->getTranslationsArrayByKey('button_title'),
            'img' => $this->getFirstMedia() ? $this->getFirstMedia()->id : null,
            'img_url' => $this->getFirstMediaUrl(),
            'deleted' => isset($this->deleted_at),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
