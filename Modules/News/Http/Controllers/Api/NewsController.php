<?php

namespace Modules\News\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\NewsRequest;
use Modules\News\Interfaces\NewsRepositoryInterface;
use Modules\News\Http\Resources\Api\NewsResource;

class NewsController extends BaseController
{

    public NewsRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(NewsRepositoryInterface $BaseRepository , News $news)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $news;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        $request->merge([
          'language' => app()->currentLocale(),
        ]);

        return NewsResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new NewsResource(
            $this->BaseRepository->find($id)->load('category','tags')
        );
    }





}
