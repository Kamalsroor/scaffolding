<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{


    public function activeToggle($id)
    {

        $service = $this->BaseRepository->find($id);

        $this->BaseRepository->UpdateActive($service , !$service->active);

        return response()->success('success' ,  $service);
    }


}
