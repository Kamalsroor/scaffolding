<?php

namespace Modules\Setting\Repositories;

use App\Helpers\ColectionPaginate;
use App\Models\Media;
use App\Repositories\CrudRepository;
use Illuminate\Support\Facades\Hash;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Interfaces\SettingRepositoryInterface;

class SettingRepository extends CrudRepository  implements SettingRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Setting $model)
    {
        $this->model = $model;
    }


    // update record in the database
    public function updateSettings($data , $validSettings , $page = null)
    {

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                if (is_array($val)) {
                    $val = serialize($val);
                }

                if ($this->model->getDataType($key, $page) != 'boolean' || $this->model->getDataType($key, $page) != 'bool') {
                    $val = $val == false ? null : $val;
                }


                if ($this->model->getDataType($key, $page) == 'img') {

                    $val = Media::find($val);
                    if($val){
                      // $val->full_url = $val->full_url;
                      $val->url = $val->full_url;
                      // $val->preview_url = $val->preview_url;
                      $val = serialize($val);
                    }
                }


                if ($this->model->getDataType($key, $page) == 'array') {
                    if ($val && is_array($val)) {
                        foreach ($val as $val_key => $value) {
                            dd($val, $val_key, $value);
                        }
                    }
                }


                $this->model->add($key, $val, $this->model->getDataType($key, $page));
            }
        }

        return true;
    }


}
