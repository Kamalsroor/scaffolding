<?php

namespace App\Repositories;

use App\Helpers\ColectionPaginate;
use App\Interfaces\CrudRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CrudRepository implements CrudRepositoryInterface
{
    // model property on class instances
    protected $model;


    // Constructor to bind model to repo
    public function __construct(Model $model)
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
            $Array = $this->model->filter()
            ->orderd()->get();

            $newArray = $SelectedArray->merge($Array);

            return ColectionPaginate::paginate($newArray , $length);
            //     ->paginate($length)
            //     ->withQueryString();

        }



        return $this->model->filter()
            ->orderd()
            ->paginate($length)
            ->withQueryString();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {

        $record = $this->find($id);
        $record->update($data);
        return $record;
    }

    // remove record from the database

    public function findInAll($id)
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    // remove record from the database

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    // remove record from the database

    public function findTrashed($id)
    {
        return $this->model->onlyTrashed()->findOrFail($id);
    }

    // show the record with the given id

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // Get the associated model

    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Set the associated model
    public function UpdateOrder($model, $data)
    {
        foreach ($data as $value) {
            $model->find($value['id'])->update(['order_id' => $value['order_id']]);
        }
        return true;
    }

    // Set the associated model
    public function UpdateActive($model, $active)
    {
        $model->update(['active' => $active]);
        return $model;
    }

    // Set the associated model
    public function duplicate($model)
    {
        $model->replicate();
        return $model;
    }

    // Set the associated model
    public function destroy($model)
    {
        $model->delete();
        return $model;
    }

    // Set the associated model
    public function restore($model)
    {
        $model->restore();
        return $model;
    }

    // Set the associated model
    public function forceDelete($model)
    {
        $model->forceDelete();
        return $model;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    // Eager load database relationships
    public function load($relations)
    {
        return $this->model->load($relations);
    }

    // Eager load database relationships
    public function max($column)
    {
        return $this->model->max($column);
    }




    // Eager load database relationships
    public function AddMediaCollection($name = 'media', $model, $collection = 'default')
    {
        $database = getDatabase($model);
        $oldMedia = $model->media()->where('collection', $collection)->where('database',$database)->first();
        if ($oldMedia) {
            $model->media()->detach($oldMedia->id);
        }
        $model->media()->attach([isset(request()->get($name)['id']) ? request()->get($name)['id'] : request()->get($name) => ['collection' => $collection,'database'=> $database]]);

    }

    // Eager load database relationships
    public function AddMediaCollectionArray($name = 'media', $model, $collection = 'default')
    {
        $database = getDatabase($model);

        $oldMedia = $model->media()->where('collection', $collection)->where('database',$database)->get();
        if ($oldMedia->count() > 0) {
            foreach ($oldMedia as $key => $value) {
                $model->media()->detach($value->id);
            }
        }
        foreach (request()->get($name) as $key => $value) {
            $model->media()->attach([isset($value['id']) ? $value['id'] : $value => ['collection' => $collection,'database'=> $database]]);
        }
    }
}
