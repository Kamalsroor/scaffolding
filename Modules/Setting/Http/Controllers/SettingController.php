<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Setting\Interfaces\SettingRepositoryInterface;
use Modules\Setting\Http\Resources\SettingResource;

class SettingController extends BaseController
{


    public SettingRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SettingRepositoryInterface $BaseRepository , Setting $setting)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $setting;
    }

    public function index(Request $request)
    {

      $setting_fields = config('setting_fields');
      foreach ($setting_fields as $setting_field_key => $setting_field) {
          if (isset($setting_field['elements']) && is_array($setting_field['elements'])) {
              foreach ($setting_field['elements'] as $element_key => $element) {
                  if(isset($element['show_example'])){
                      $setting_fields[$setting_field_key]['elements'][$element_key]['show_example'] = route($element['show_example']);
                  }
                  $setting_fields[$setting_field_key]['elements'][$element_key]['value'] = $this->model->get($element['name']);
              }
          }
      }


      return response()->success('success' , $setting_fields);

        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return SettingResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }



    public function page($page)
    {
        $setting_fields = Setting::getDefinedSetting($page);
        $firstPage = null;
        $i = 0 ;
        foreach ($setting_fields['section'] as $setting_field_key => $setting_field) {
            if($i == 0){
                $firstPage = $setting_field_key;
                $i++;
            }
            if(isset($setting_field['elements']) && is_array($setting_field['elements'])){
                foreach ($setting_field['elements'] as $element_key => $element) {
                    $setting_fields['section'][$setting_field_key]['elements'][$element_key]['value'] =   Setting::get($element['name'] ) ?? (isset($setting_fields['section'][$setting_field_key]['elements'][$element_key]['value']) ? Setting::getDataType($setting_fields['section'][$setting_field_key]['elements'][$element_key]['value'] , 'home') : null) ;
                }
            }
        }



        return response()->success('success', ['data' => $setting_fields , 'tab' => $firstPage]);
    }



    public function show($id)
    {
        return new SettingResource(
            $this->BaseRepository->find($id)->load('Sections')
        );
    }



    public function update(Request $request)
    {
        $rules = Setting::getValidationRules($request->page , $request->get('tab' , null));
        $request->validate($rules);
        $validSettings = array_keys($rules);
        $this->BaseRepository->updateSettings($request->all() , $validSettings , $request->page );


        return response()->success('success');
    }
}
