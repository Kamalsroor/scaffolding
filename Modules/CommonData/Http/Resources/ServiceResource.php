<?php

namespace Modules\CommonData\Http\Resources;

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
            'active' => $this->active ? true : false,
            'order_id' => $this->order_id,
            'title' => $this->getTranslationsArrayByKey('title'),
            'description' => $this->getTranslationsArrayByKey('description'),
            'img' => $this->getFirstMedia() ? $this->getFirstMedia()->id : null,
            'img_url' => $this->getFirstMediaUrl(),
            'deleted' => isset($this->deleted_at),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
