<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Role;
use Modules\Admin\Http\Requests\RoleRequest;
use Modules\Admin\Interfaces\RoleRepositoryInterface;
use Modules\Admin\Http\Resources\RoleResource;

class RoleController extends BaseController
{


    public RoleRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(RoleRepositoryInterface $BaseRepository , Role $role)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $role;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return RoleResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new RoleResource(
            $this->BaseRepository->find($id)->load('permissions')
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\RoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {

        $role = $this->BaseRepository->create($request->validated());
        return response()->success('success' , new RoleResource($role));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\RoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request , $id)
    {
        $role = $this->BaseRepository->update($request->validated() , $id);
        return response()->success('update successfully' ,  new RoleResource($role));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\RoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->BaseRepository->findInAll($id);
        if($role->trashed()){
            $this->BaseRepository->forceDelete($role);
        }else{
            $this->BaseRepository->destroy($role);
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
