<?php

namespace Modules\MemberArea\Repositories;


use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\Hash;
use Modules\MemberArea\Entities\MemberArea;
use Modules\MemberArea\Interfaces\MemberAreaRepositoryInterface;

class MemberAreaRepository extends CrudRepository  implements MemberAreaRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(MemberArea $model)
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



    // create a new record in the database
    public function create(array $data)
    {
        if(isset($data['password'])){
            $data['unhashed_password'] =  $data['password'];
            $data['password'] =  Hash::make($data['password']);
        }
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {

        if(isset($data['password'])){
            $data['unhashed_password'] =  $data['password'];
            $data['password'] =  Hash::make($data['password']);
        }
        $record = $this->find($id);
        $record->update($data);
        return $record;
    }


}
