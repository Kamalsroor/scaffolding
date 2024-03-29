<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Interfaces\ProductRepositoryInterface;
use Modules\Product\Http\Resources\ProductResource;

class ProductController extends BaseController
{


    public ProductRepositoryInterface $BaseRepository;
    protected $model;

    public function __construct(ProductRepositoryInterface $BaseRepository , Product $product)
    {
        // $this->authorizeResource(Service::class);
        $this->BaseRepository = $BaseRepository;
        $this->model = $product;
    }

    public function index(Request $request)
    {
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return ProductResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
        // return response()->error('Your custom error message', 'Validation errors or else');
    }


    public function show($id)
    {
        return new ProductResource(
            $this->BaseRepository->find($id)->load('Sections','attributes.parent','attributes.subAttribute')
        );
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

      $product = $this->BaseRepository->create($request->validated());

      foreach ($request->get('sections' , []) as $key => $value) {

        $complaed = handelVueTamplate($value['html'] , $value['inputs']);
        $product->Sections()->create([
          'order_id' => $key,
          'section_id' => $value['id'],
          'inputs' => $value['inputs'],
          'html' => $value['html'],
          'complaed_html' => $complaed,
        ]);
      }

      foreach ($request->attributes_final as $key => $value) {
        $product->attributes()->attach($value['id'], ['value' => json_encode($value['value'])]);
      }

      return response()->success('success' , new ProductResource($product->load('Sections','attributes')));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request , $id)
    {
        $product = $this->BaseRepository->update($request->validated() , $id);
        $crruntSections = [];
        foreach ($request->get('sections' , []) as $key => $value) {

          $complaed = handelVueTamplate($value['html'] , $value['inputs']);

          $section = $product->Sections()->updateOrCreate([
            'id' => isset($value['id']) ? $value['id'] : 0,
          ],[
            'order_id' => $key,
            'section_id' => $value['section_id'],
            'inputs' => $value['inputs'],
            'html' => $value['html'],
            'complaed_html' => $complaed,
          ]);
          $crruntSections [] = $section->id;
        }

        $product->attributes()->detach();
        foreach ($request->attributes_final as $key => $value) {
          $product->attributes()->attach($value['id'], ['value' => json_encode($value['value'])]);
        }

        $product->Sections()->whereNotIn('id' , $crruntSections)->delete();
        return response()->success('update successfully' , new ProductResource($product->load('Sections')));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->BaseRepository->findInAll($id);
        if($product->trashed()){
            $this->BaseRepository->forceDelete($product);
        }else{
            $this->BaseRepository->destroy($product);
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
