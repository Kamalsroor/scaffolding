<?php

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\News\Entities\Category;
use Modules\News\Http\Requests\CategoryRequest;
use Modules\News\Interfaces\CategoryRepositoryInterface;
use Modules\News\Http\Resources\CategoryResource;

class CategoryController extends BaseController
{


    public CategoryRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(CategoryRepositoryInterface $BaseRepository , Category $category)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $category;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return CategoryResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new CategoryResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $category = $this->BaseRepository->create($request->validated());


        return response()->success('success' , new CategoryResource($category));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request , $id)
    {
        $category = $this->BaseRepository->update($request->validated() , $id);

        return response()->success('update successfully' ,  new CategoryResource($category));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->BaseRepository->findInAll($id);
        if($category->trashed()){
            $this->BaseRepository->forceDelete($category);
        }else{
            $this->BaseRepository->destroy($category);
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
