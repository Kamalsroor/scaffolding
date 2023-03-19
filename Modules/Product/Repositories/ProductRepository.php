<?php

namespace Modules\Product\Repositories;

use App\Helpers\ColectionPaginate;
use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\Hash;
use Modules\Product\Entities\Product;
use Modules\Product\Interfaces\ProductRepositoryInterface;

class ProductRepository extends CrudRepository  implements ProductRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Product $model)
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
          ->get();

          $newArray = $SelectedArray->merge($Array);

          return ColectionPaginate::paginate($newArray , $length);

      }



      return $this->model->filter()
          ->paginate($length);
    }



    // create a new record in the database
    public function create(array $data)
    {

        $model = parent::create($data);

        $this->AddMediaCollection('img' , $model);
            if(isset($data['file'])){
              $this->AddMediaCollection('file' , $model,'product_file');
            }

            if(isset($data['video']) && is_array($data['video'] && count($data['video']))){

              $this->AddMediaCollectionArray('video' , $model,'product_video');
            }


        return $model;

    }

    // update record in the database
    public function update(array $data, $id)
    {


      $model = parent::update($data , $id);
      $this->AddMediaCollection('img' , $model);
      if(isset($data['file'])){

        $this->AddMediaCollection('file' , $model,'product_file');
      }
      if(isset($data['video']) && is_array($data['video'] && count($data['video']))){

        $this->AddMediaCollectionArray('video' , $model,'product_video');
      }

        return $model;
    }


}
