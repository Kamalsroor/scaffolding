<?php

namespace Modules\News\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\News\Entities\Tag;
use Modules\News\Http\Requests\TagRequest;
use Modules\News\Interfaces\TagRepositoryInterface;
use Modules\News\Http\Resources\TagResource;

class TagController extends BaseController
{


    public TagRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(TagRepositoryInterface $BaseRepository , Tag $tag)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $tag;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return TagResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new TagResource(
            $this->BaseRepository->find($id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $tag = $this->BaseRepository->create($request->validated());


        return response()->success('success' , new TagResource($tag));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request , $id)
    {
        $tag = $this->BaseRepository->update($request->validated() , $id);

        return response()->success('update successfully' ,  new TagResource($tag));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->BaseRepository->findInAll($id);
        if($tag->trashed()){
            $this->BaseRepository->forceDelete($tag);
        }else{
            $this->BaseRepository->destroy($tag);
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
