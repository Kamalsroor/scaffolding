<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Product\Entities\Attribute;
use Modules\Product\Http\Requests\AttributeRequest;
use Modules\Product\Interfaces\AttributeRepositoryInterface;
use Modules\Product\Http\Resources\AttributeResource;

class AttributeController extends BaseController
{


    public AttributeRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(AttributeRepositoryInterface $BaseRepository , Attribute $attribute)
    {
        // $this->authorizeResource(Attribute::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $attribute;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return AttributeResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new AttributeResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AttributeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {

        $attribute = $this->BaseRepository->create($request->validated());


        return response()->success('success' , new AttributeResource($attribute));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AttributeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request , $id)
    {

      $attribute = $this->BaseRepository->update($request->validated() , $id);

        return response()->success('update successfully' ,  new AttributeResource($attribute));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AttributeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = $this->BaseRepository->findInAll($id);
        if($attribute->trashed()){
            $this->BaseRepository->forceDelete($attribute);
        }else{
            $this->BaseRepository->destroy($attribute);
        }
        return response()->success('deleted successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\AttributeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $this->BaseRepository->restore($this->BaseRepository->findTrashed($id));
        return response()->success('restored successfully');
    }



    public function haveChildToggle($id)
    {

        $attribute = $this->BaseRepository->find($id);

        $this->BaseRepository->UpdateHaveChild($attribute , !$attribute->have_child);

        return response()->success('success' ,  $attribute);
    }


}
