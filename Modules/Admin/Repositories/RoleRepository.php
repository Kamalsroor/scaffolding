<?php

namespace Modules\Admin\Repositories;

use App\Helpers\ColectionPaginate;
use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Role;
use Modules\Admin\Interfaces\RoleRepositoryInterface;

class RoleRepository extends CrudRepository  implements RoleRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Role $model)
    {
        $this->model = $model;
    }



    // get a all  record in the database
    public function all($queries = [])
    {
        $length = isset($queries['length']) ? $queries['length'] : 10;
        $length = isset($queries['perPage']) ? $queries['perPage'] : $length;
        $Selected = isset($queries['id']) && $queries['id'];




        if($length == 'all'){
            $length = $this->model->all()->count() ;
        }


        if($Selected){

            $SelectedArray = $this->model->where('id' , $queries['id'] )->get();
            $Array = $this->model->filter()->with('permissions')->get();

            $newArray = $SelectedArray->merge($Array);

            return ColectionPaginate::paginate($newArray , $length);
            //     ->paginate($length)
            //     ->withQueryString();

        }



        return $this->model->filter()
            ->with('permissions')
            ->paginate($length)
            ->withQueryString();


    }



    // create a new record in the database
    public function create(array $data)
    {

        $role = $this->model::create(['guard_name' => 'admin', 'name' => $data['name']]);

        $role->syncPermissions($data['permissions']);

        return $role;
    }

    // update record in the database
    public function update(array $data, $id)
    {



        $record = $this->find($id);
        $record->update(['name' => $data['name']]);

        $record->syncPermissions($data['permissions']);

        return $record;
    }


}
