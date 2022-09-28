<?php

namespace Modules\MemberArea\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\MemberArea\Entities\MemberArea;
use Modules\MemberArea\Http\Requests\MemberAreaRequest;
use Modules\MemberArea\Interfaces\MemberAreaRepositoryInterface;
use Modules\MemberArea\Http\Resources\MemberAreaResource;

class MemberAreaController extends BaseController
{


    public MemberAreaRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(MemberAreaRepositoryInterface $BaseRepository , MemberArea $admin)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $admin;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return MemberAreaResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new MemberAreaResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\MemberAreaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberAreaRequest $request)
    {

        $admin = $this->BaseRepository->create($request->validated());
        return response()->success('success' , new MemberAreaResource($admin));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\MemberAreaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(MemberAreaRequest $request , $id)
    {
        $admin = $this->BaseRepository->update($request->validated() , $id);
        return response()->success('update successfully' ,  new MemberAreaResource($admin));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\MemberAreaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = $this->BaseRepository->findInAll($id);
        if($admin->trashed()){
            $this->BaseRepository->forceDelete($admin);
        }else{
            $this->BaseRepository->destroy($admin);
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
