<?php

namespace Modules\Product\Http\Resources\Api;

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



      // dd($this->attributes);

      $new_attr = [];

      foreach ($this->product_attributes()->with('parent')->get() as $key => $attr) {

        if($attr->parent_id !== 0){
          $new_attr[$attr->parent_id]['name'] = $attr->parent->name;
          $new_attr[$attr->parent_id]['have_child'] = $attr->parent->have_child;
          if($attr->parent->have_child){
            $value =  json_decode($attr->pivot->value,true);
            if($value){
              $value = isset($value[app()->currentLocale()]) ? $value[app()->currentLocale()] : reset($value);
            }else{
              $value = $attr->pivot->value;
            }

            // $value = isset($value[app()->currentLocale()]) ? $value[app()->currentLocale()] : reset($value);
            $new_attr[$attr->parent_id]['attributes'][] = [
              'name' => $attr->name,
              'value' => $value,
            ];
          }else{
            unset($new_attr[$attr->parent_id]);
          }

        }else{
          $new_attr[$attr->parent_id]['name'] = $attr->name;
          $new_attr[$attr->parent_id]['have_child'] = $attr->have_child;
          if(!$attr->have_child){
            $value =  json_decode($attr->pivot->value ,true);
            if($value){
              $value = isset($value[app()->currentLocale()]) ? $value[app()->currentLocale()] : reset($value);
            }else{
              $value = $attr->pivot->value;
            }
            $new_attr[$attr->parent_id]['value'] = $value;
          }

        }


      }

      $newVideos = [];

      $videos =  $this->getMediaWithThumbnail('product_video') ;
      if(count($videos)){
        // $videos = $videos->pluck('pivot.thumbnail_id','id');
        foreach ($videos as $key => $video ) {
          $newVideos[$key]['video'] = $video->full_url;
          $newVideos[$key]['thumbnail'] = $video->thumbnail_url;
        }
      }



    //  ->groupBy('parent_id')->toArray()
        return [
          'id' => $this->id,
          'name' => $this->name,
          'file_url' => $this->getFirstMediaUrl('product_file'),
          'img_url' => $this->getFirstMediaUrl(),
          'attributes' => $new_attr,
          'videos' => $newVideos,
          'sections' => ProductSectionResource::collection($this->whenLoaded('Sections')),
        ];
    }
}
