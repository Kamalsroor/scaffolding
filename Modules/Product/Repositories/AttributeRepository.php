<?php

namespace Modules\Product\Repositories;

use App\Helpers\ColectionPaginate;
use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\Hash;
use Modules\Product\Entities\Attribute;
use Modules\Product\Interfaces\AttributeRepositoryInterface;

class AttributeRepository extends CrudRepository  implements AttributeRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Attribute $model)
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

          $SelectedArray = $this->model->where('id' , $queries['id'] )->with('parent')->get();
          $Array = $this->model->filter()->with('parent','subAttribute')
          ->get();

          $newArray = $SelectedArray->merge($Array);

          return ColectionPaginate::paginate($newArray , $length);

      }



      return $this->model->filter()->with('parent','subAttribute')
          ->paginate($length);
    }



  // Set the associated model
  public function UpdateHaveChild($model, $have_child)
  {
      $model->update(['have_child' => $have_child]);
      return $model;
  }

}
