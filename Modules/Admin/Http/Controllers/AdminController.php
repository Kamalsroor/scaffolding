<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\AdminRequest;
use Modules\Admin\Interfaces\AdminRepositoryInterface;
use Modules\Admin\Http\Resources\AdminResource;

class AdminController extends BaseController
{


    public AdminRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(AdminRepositoryInterface $BaseRepository , Admin $admin)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $admin;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return AdminResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new AdminResource(
            $this->BaseRepository->find($id)->load('roles')->loadCount('roles')
        );
    }



    public function getAuthPermissions()
    {
      return response()->success('success' , auth('admin')->user()->getPermissionsViaRoles()->pluck('name'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

        $admin = $this->BaseRepository->create($request->validated());
        return response()->success('success' , new AdminResource($admin));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request , $id)
    {
        $admin = $this->BaseRepository->update($request->validated() , $id);
        return response()->success('update successfully' ,  new AdminResource($admin));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AdminRequest $request
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
