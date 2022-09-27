<?php

namespace Modules\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            // 'can' => $this->can,
            'email' => $this->email,
            // 'permissions' => $this->getAllPermissionsAttribute(),
            'des' => $this->des,
            'mini_des' => $this->mini_des,
            'slug' => $this->slug,
            'order_id' => $this->order_id,
            'active' => $this->active,
        ];
    }
}
