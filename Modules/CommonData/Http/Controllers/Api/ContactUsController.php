<?php

namespace Modules\CommonData\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\ContactUs;
use Modules\CommonData\Http\Requests\ContactUsRequest;
use Modules\CommonData\Interfaces\ContactUsRepositoryInterface;
// use Modules\CommonData\Http\Resources\Api\ContactUsResource;

class ContactUsController extends BaseController
{

    public ContactUsRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(ContactUsRepositoryInterface $BaseRepository , ContactUs $sponser)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $sponser;
    }

    public function store(ContactUsRequest $request)
    {
      $contact_us = $this->BaseRepository->create($request->validated());
       return response()->success('We Will Contact With You As Fast Soon As Possible');

    }






}
