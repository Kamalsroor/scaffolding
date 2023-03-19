<?php

namespace Modules\CommonData\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Subscribe;
use Modules\CommonData\Http\Requests\SubscribeRequest;
use Modules\CommonData\Interfaces\SubscribeRepositoryInterface;
use Modules\CommonData\Http\Resources\SubscribeResource;

class SubscribeController extends BaseController
{


    public SubscribeRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SubscribeRepositoryInterface $BaseRepository , Subscribe $subscribe)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $subscribe;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return SubscribeResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new SubscribeResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SubscribeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscribeRequest $request)
    {

        $subscribe = $this->BaseRepository->create($request->validated());
        $this->BaseRepository->AddMediaCollection('img' , $subscribe);


        return response()->success('success' , new SubscribeResource($subscribe));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SubscribeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(SubscribeRequest $request , $id)
    {
        $subscribe = $this->BaseRepository->update($request->validated() , $id);
        $this->BaseRepository->AddMediaCollection('img' , $subscribe);

        return response()->success('update successfully' ,  new SubscribeResource($subscribe));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SubscribeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscribe = $this->BaseRepository->findInAll($id);
        if($subscribe->trashed()){
            $this->BaseRepository->forceDelete($subscribe);
        }else{
            $this->BaseRepository->destroy($subscribe);
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
