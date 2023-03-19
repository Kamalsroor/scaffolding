<?php

namespace Modules\News\Http\Resources\Api;

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
          'date' => $this->date,
          'category' => new CategoryResource($this->whenLoaded('category')),
          'tags' => TagResource::collection($this->whenLoaded('tags')),
          'title' => $this->title,
          'description' => $this->description,
          'mini_description' => $this->mini_description,
          'img_url' => $this->getFirstMediaUrl(),
          'img_type' => $this->getFirstMedia() ? $this->getFirstMedia()->file_type : null,
        ];
    }
}
