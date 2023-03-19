<?php

namespace Modules\CommonData\Entities;

use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\ServiceFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Service extends Model implements TranslatableContract
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
    public $translatedAttributes = ['title','description'];
    public $with = ['translations','media'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'active',
        'order_id',
    ];




    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = ServiceFilter::class;




    protected static function newFactory()
    {
        return \Modules\CommonData\Database\factories\ServiceFactory::new();
    }


}
