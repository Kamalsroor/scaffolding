<?php

namespace Modules\Product\Entities;

use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Http\Filters\ProductFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    use HasMedia;
    use OrderByScope;
    use Translatable, TranslatableHelper {
      TranslatableHelper::fill insteadof Translatable;
    }


    public $translatedAttributes = ['name'];
    public $with = ['translations','media'];


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

      /**
     * Get the sections for the products.
     */
    public function Sections()
    {
        return $this->hasMany(ProductSection::class)->orderByRaw('ifnull(order_id, id)');
    }



      /**
     * Get the Attributes for the products.
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class ,'attribute_product')->withPivot(['value']);
    }




      /**
     * Get the Attributes for the products.
     */
    public function product_attributes()
    {
        return $this->belongsToMany(Attribute::class ,'attribute_product')->withPivot(['value']);
    }



}
