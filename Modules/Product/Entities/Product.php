<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Http\Filters\ProductFilter;

class Product extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];




    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = ProductFilter::class;




    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

}
