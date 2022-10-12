<?php

namespace Modules\Admin\Entities;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Http\Filters\RoleFilter;
use Spatie\Permission\Models\Role as OriginalRole;

class Role extends OriginalRole
{

    use Filterable;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at',
    ];

    protected $filter = RoleFilter::class;

}
