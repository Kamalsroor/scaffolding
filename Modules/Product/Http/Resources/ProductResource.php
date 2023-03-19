<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
          $newVideos = [];

          $videos =  $this->getMediaWithThumbnail('product_video') ;
          if(count($videos)){
            // $videos = $videos->pluck('pivot.thumbnail_id','id');
            foreach ($videos as $key => $video ) {
              $newVideos[$key]['id'] = $video->id;
              $newVideos[$key]['thumbnail_id'] = $video->thumbnail_id;
              $newVideos[$key]['thumbnail_url'] = $video->thumbnail_url;
            }
          }
          return [
          'id' => $this->id,
          'active' => $this->active ? true : false,
          'order_id' => $this->order_id,
          'name' => $this->getTranslationsArrayByKey('name'),
          'img' => $this->getFirstMedia('default') ? $this->getFirstMedia('default')->id : null,
          'img_url' => $this->getFirstMediaUrl('default'),
          'file' => $this->getFirstMedia('product_file') ? $this->getFirstMedia('product_file')->id : null,
          'file_url' => $this->getFirstMediaUrl('product_file'),
          'video' => $newVideos,
          'sections' => ProductSectionResource::collection($this->whenLoaded('Sections')),
          'attributes' => AttributeProductsResource::collection($this->whenLoaded('attributes')),
          'deleted' => isset($this->deleted_at),
          'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
