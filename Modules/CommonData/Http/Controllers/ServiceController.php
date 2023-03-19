<?php

namespace Modules\CommonData\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Service;
use Modules\CommonData\Http\Requests\ServiceRequest;
use Modules\CommonData\Interfaces\ServiceRepositoryInterface;
use Modules\CommonData\Http\Resources\ServiceResource;

class ServiceController extends BaseController
{


    public ServiceRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(ServiceRepositoryInterface $BaseRepository , Service $service)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $service;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return ServiceResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new ServiceResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ServiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {

        $service = $this->BaseRepository->create($request->validated());
        $this->BaseRepository->AddMediaCollection('img' , $service);


        return response()->success('success' , new ServiceResource($service));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ServiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request , $id)
    {
        $service = $this->BaseRepository->update($request->validated() , $id);
        $this->BaseRepository->AddMediaCollection('img' , $service);

        return response()->success('update successfully' ,  new ServiceResource($service));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ServiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->BaseRepository->findInAll($id);
        if($service->trashed()){
            $this->BaseRepository->forceDelete($service);
        }else{
            $this->BaseRepository->destroy($service);
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
