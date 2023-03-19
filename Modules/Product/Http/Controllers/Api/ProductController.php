<?php

namespace Modules\Product\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Interfaces\ProductRepositoryInterface;
use Modules\Product\Http\Resources\Api\ProductResource;

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
        $queries = ['columnFilters','perPage', 'page','sort','deleted','length','featured'];
        return ProductResource::collection(
            $this->BaseRepository->all($request->only($queries))
        );
    }


    public function show($id)
    {
        return new ProductResource(
            $this->BaseRepository->find($id)->load('Sections','attributes')
        );
    }





}
