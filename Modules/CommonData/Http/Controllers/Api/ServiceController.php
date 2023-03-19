<?php

namespace Modules\CommonData\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Service;
use Modules\CommonData\Interfaces\ServiceRepositoryInterface;
use Modules\CommonData\Http\Resources\Api\ServiceResource;

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




}
