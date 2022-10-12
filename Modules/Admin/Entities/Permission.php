<?php

namespace Modules\Admin\Entities;

use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
    protected $fillable = [
        'name',
        'guard_name',
        'group',
        'title',
        'updated_at',
        'created_at',
    ];
}
