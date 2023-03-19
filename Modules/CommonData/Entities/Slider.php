<?php

namespace Modules\CommonData\Entities;

use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\SliderFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Slider extends Model implements TranslatableContract
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    // use Translatable;
    use HasMedia;
    use OrderByScope;
    // use TranslatableHelper;
    use Translatable, TranslatableHelper {
      TranslatableHelper::fill insteadof Translatable;
    }
    public $translatedAttributes = ['title','sub_title','button_title'];
    public $with = ['translations','media'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'active',
        'link',
        'order_id',
    ];




    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = SliderFilter::class;




    protected static function newFactory()
    {
        return \Modules\CommonData\Database\factories\SliderFactory::new();
    }


}
