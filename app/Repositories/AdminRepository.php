<?php

namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;

class AdminRepository extends CrudRepository  implements AdminRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }


 
    // get a all  record in the database
    public function all($queries = [])
    {
        $length = isset($queries['length']) ? $queries['length'] : 10;
        return $this->model->filter()
            ->paginate($length);
    }

}
