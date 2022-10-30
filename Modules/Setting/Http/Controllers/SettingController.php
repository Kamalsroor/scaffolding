<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
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
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return SettingResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new SettingResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {

        $setting = $this->BaseRepository->create($request->validated());
        return response()->success('success' , new SettingResource($setting));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request , $id)
    {
        $setting = $this->BaseRepository->update($request->validated() , $id);
        return response()->success('update successfully' ,  new SettingResource($setting));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this->BaseRepository->findInAll($id);
        if($setting->trashed()){
            $this->BaseRepository->forceDelete($setting);
        }else{
            $this->BaseRepository->destroy($setting);
        }
        return response()->success('deleted successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ServiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->BaseRepository->restore($this->BaseRepository->findTrashed($id));
        return response()->success('restored successfully');
    }


}
