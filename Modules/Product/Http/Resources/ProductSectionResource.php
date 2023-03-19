<?php

namespace Modules\Product\Http\Resources;

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
          'product_id' => $this->product_id,
          'order_id' => $this->order_id,
          'section_id' => $this->section_id,
          'inputs' => $this->inputs,
          'html' => $this->html,
          // 'complaed_html' => $this->complaed_html,
          'complaed_html' => handelVueTamplate($this->html ,  $this->inputs)
        ];
    }
}
