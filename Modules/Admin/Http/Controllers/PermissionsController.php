<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Interfaces\PermissionRepositoryInterface;
use Modules\Admin\Http\Resources\PermissionResource;

class PermissionsController extends BaseController
{


    public PermissionRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(PermissionRepositoryInterface $BaseRepository , Permission $permission)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $permission;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return $this->BaseRepository->all($request->only($queries));
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


}
