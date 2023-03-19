<?php

namespace Modules\CommonData\Repositories;

use App\Helpers\ColectionPaginate;
use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Sponser;
use Modules\CommonData\Interfaces\SponserRepositoryInterface;

class SponserRepository extends CrudRepository  implements SponserRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Sponser $model)
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


    // Set the associated model
    public function UpdateFeature($model, $is_feature)
    {
        $model->update(['is_feature' => $is_feature]);
        return $model;
    }


}
