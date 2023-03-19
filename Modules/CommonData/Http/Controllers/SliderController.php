<?php

namespace Modules\CommonData\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\Slider;
use Modules\CommonData\Http\Requests\SliderRequest;
use Modules\CommonData\Interfaces\SliderRepositoryInterface;
use Modules\CommonData\Http\Resources\SliderResource;

class SliderController extends BaseController
{


    public SliderRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(SliderRepositoryInterface $BaseRepository , Slider $slider)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $slider;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return SliderResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new SliderResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SliderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {

        $slider = $this->BaseRepository->create($request->validated());
        $this->BaseRepository->AddMediaCollection('img' , $slider);


        return response()->success('success' , new SliderResource($slider));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SliderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request , $id)
    {
        $slider = $this->BaseRepository->update($request->validated() , $id);
        $this->BaseRepository->AddMediaCollection('img' , $slider);

        return response()->success('update successfully' ,  new SliderResource($slider));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\SliderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this->BaseRepository->findInAll($id);
        if($slider->trashed()){
            $this->BaseRepository->forceDelete($slider);
        }else{
            $this->BaseRepository->destroy($slider);
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
