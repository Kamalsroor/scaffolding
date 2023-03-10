<?php

namespace Modules\Admin\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            // 'email' => $this->email,
            // 'password' => $this->unhashed_password,
            'permissions_list' => $this->whenLoaded('permissions'),
            'permissions' => $this->when(
                $this->relationLoaded('permissions'),
                function () {
                    return $this->permissions()->pluck('name');
                }),
            'deleted' => isset($this->deleted_at),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
            // 'permissions' => $this->getAllPermissionsAttribute(),

            // 'active' => $this->active,
        ];
    }
}
