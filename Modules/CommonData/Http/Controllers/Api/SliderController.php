<?php

namespace Modules\CommonData\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Slider;
use Modules\CommonData\Interfaces\SliderRepositoryInterface;
use Modules\CommonData\Http\Resources\Api\SliderResource;

class SliderController extends BaseController
{

    public SliderRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SliderRepositoryInterface $BaseRepository , Slider $sponser)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $sponser;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return SliderResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }




}
