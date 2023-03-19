<?php

namespace Modules\CommonData\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\CommonData\Entities\ContactUs;
use Modules\CommonData\Http\Requests\ContactUsRequest;
use Modules\CommonData\Interfaces\ContactUsRepositoryInterface;
use Modules\CommonData\Http\Resources\ContactUsResource;

class ContactUsController extends BaseController
{


    public ContactUsRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(ContactUsRepositoryInterface $BaseRepository , ContactUs $contact_us)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $contact_us;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return ContactUsResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
      $contact_us =  $this->BaseRepository->find($id);

      if(!$contact_us->show_date){
        $this->BaseRepository->update([
          'show_date' => Carbon::now()
        ], $id);
      }

        return new ContactUsResource($contact_us);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ContactUsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactUsRequest $request)
    {

        $contact_us = $this->BaseRepository->create($request->validated());
        $this->BaseRepository->AddMediaCollection('img' , $contact_us);


        return response()->success('success' , new ContactUsResource($contact_us));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ContactUsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUsRequest $request , $id)
    {
        $contact_us = $this->BaseRepository->update($request->validated() , $id);
        $this->BaseRepository->AddMediaCollection('img' , $contact_us);

        return response()->success('update successfully' ,  new ContactUsResource($contact_us));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ContactUsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact_us = $this->BaseRepository->findInAll($id);
        if($contact_us->trashed()){
            $this->BaseRepository->forceDelete($contact_us);
        }else{
            $this->BaseRepository->destroy($contact_us);
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
