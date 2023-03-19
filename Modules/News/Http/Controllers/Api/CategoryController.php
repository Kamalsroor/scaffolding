<?php

namespace Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\News\Entities\Category;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\News\Interfaces\CategoryRepositoryInterface;
use Modules\News\Http\Resources\Api\CategoryResource;

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
            $this->BaseRepository->find($id)->load('category','tags')
        );
    }





}
