<?php

namespace Modules\CommonData\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Sponser;
use Modules\CommonData\Http\Requests\SponserRequest;
use Modules\CommonData\Interfaces\SponserRepositoryInterface;
use Modules\CommonData\Http\Resources\SponserResource;

class SponserController extends BaseController
{


    public SponserRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SponserRepositoryInterface $BaseRepository , Sponser $sponser)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $sponser;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return SponserResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new SponserResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SponserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponserRequest $request)
    {

        $sponser = $this->BaseRepository->create($request->validated());
        return response()->success('success' , new SponserResource($sponser));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SponserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(SponserRequest $request , $id)
    {
        $sponser = $this->BaseRepository->update($request->validated() , $id);
        return response()->success('update successfully' ,  new SponserResource($sponser));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SponserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponser = $this->BaseRepository->findInAll($id);
        if($sponser->trashed()){
            $this->BaseRepository->forceDelete($sponser);
        }else{
            $this->BaseRepository->destroy($sponser);
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
