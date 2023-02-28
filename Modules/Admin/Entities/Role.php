<?php

namespace Modules\Admin\Entities;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Http\Filters\RoleFilter;
use Spatie\Permission\Models\Role as OriginalRole;

class Role extends OriginalRole
{

    use Filterable;
    use SoftDeletes;
    use HasFactory;


    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at',
    ];

    protected $filter = RoleFilter::class;


    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RoleFactory::new();
    }

}
