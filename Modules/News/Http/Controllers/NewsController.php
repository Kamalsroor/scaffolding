<?php

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\News\Entities\News;
use Modules\News\Http\Requests\NewsRequest;
use Modules\News\Interfaces\NewsRepositoryInterface;
use Modules\News\Http\Resources\NewsResource;

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
        return NewsResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new NewsResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {

        $news = $this->BaseRepository->create($request->validated());
        $this->BaseRepository->AddMediaCollection('img' , $news);
        if($request->tags != null){

             $news->tags()->attach($request->tags);
        }
        return response()->success('success' , new NewsResource($news));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request , $id)
    {
        $news = $this->BaseRepository->update($request->validated() , $id);
        $this->BaseRepository->AddMediaCollection('img' , $news);
        $news->tags()->sync($request->tags);
        return response()->success('update successfully' ,  new NewsResource($news));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = $this->BaseRepository->findInAll($id);
        if($news->trashed()){
            $this->BaseRepository->forceDelete($news);
        }else{
            $this->BaseRepository->destroy($news);
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
