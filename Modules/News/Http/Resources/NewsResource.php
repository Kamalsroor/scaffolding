<?php

namespace Modules\News\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'date' => $this->date,
            'order_id' => $this->order_id,
            'category_id' => $this->category_id,
            'language' => $this->language,
            'category' => CategoryResource::collection($this->whenLoaded('category')),
            'tags' => $this->tags->pluck('id'),
            'title' => $this->title,
            'description' => $this->description,
            'mini_description' => $this->mini_description,
            'img' => $this->getFirstMedia() ? $this->getFirstMedia()->id : null,
            'img_url' => $this->getFirstMediaUrl(),
            'deleted' => isset($this->deleted_at),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
