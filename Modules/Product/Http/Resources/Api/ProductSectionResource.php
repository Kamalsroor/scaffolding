<?php

namespace Modules\Product\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSectionResource extends JsonResource
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
          'complaed_html' => isset($this->complaed_html[app()->currentLocale()]) ? $this->complaed_html[app()->currentLocale()] : reset($this->complaed_html),
          // 'complaed_html' => handelVueTamplate($this->html ,  $this->inputs)
        ];
    }
}
