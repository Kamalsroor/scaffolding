<?php

namespace Modules\Admin\Repositories;


use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Interfaces\PermissionRepositoryInterface;

class PermissionRepository extends CrudRepository  implements PermissionRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }



    // get a all  record in the database
    public function all($queries = [])
    {
        return $this->model->orderBy('name')->get()->groupBy('group');
    }



}
