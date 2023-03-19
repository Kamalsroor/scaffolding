<?php

namespace Modules\CommonData\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Sponser;
use Modules\CommonData\Interfaces\SponserRepositoryInterface;
use Modules\CommonData\Http\Resources\Api\SponserResource;

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

}
