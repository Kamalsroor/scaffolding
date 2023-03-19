<?php

namespace Modules\CommonData\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Subscribe;
use Modules\CommonData\Http\Requests\SubscribeRequest;
use Modules\CommonData\Interfaces\SubscribeRepositoryInterface;
// use Modules\CommonData\Http\Resources\Api\ContactUsResource;

class SubscribeController extends BaseController
{

    public SubscribeRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SubscribeRepositoryInterface $BaseRepository , Subscribe $sponser)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $sponser;
    }

    public function store(SubscribeRequest $request)
    {
       $this->BaseRepository->create($request->validated());
       return response()->success('Subscribe Added Successfully');

    }
}
