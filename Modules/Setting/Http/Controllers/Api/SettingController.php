<?php

namespace Modules\Setting\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Setting\Interfaces\SettingRepositoryInterface;
use Modules\Setting\Http\Resources\Api\SettingResource;

class SettingController extends BaseController
{

    public SettingRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SettingRepositoryInterface $BaseRepository , Setting $setting)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $setting;
    }

    public function index(Request $request)
    {

        return response()->success('success', getAllSettingsWithValues($request->get('page' , null)));
    }







}
