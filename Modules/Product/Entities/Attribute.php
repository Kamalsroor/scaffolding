<?php

namespace Modules\Product\Entities;

use App\Models\Scope\OrderByScope;
use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Http\Filters\AttributeFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Attribute extends Model implements TranslatableContract
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    use OrderByScope;
    use Translatable, TranslatableHelper {
      TranslatableHelper::fill insteadof Translatable;
    }


    public $translatedAttributes = ['name'];
    public $with = ['translations'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'order_id',
        'active',
        'have_child',
    ];



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $casts = [
      'have_child' => 'boolean',
  ];



    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = AttributeFilter::class;



    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\AttributeFactory::new();
    }


    public function subAttribute() {
       return  $this->hasMany(Attribute::class , 'parent_id');
    }

    public function parent() {
      return $this->belongsTo(Attribute::class , 'parent_id');
   }

}
