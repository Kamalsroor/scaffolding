<?php

namespace Modules\News\Entities;

use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\News\Http\Filters\TagFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Tag extends Model implements TranslatableContract
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    // use Translatable;
    // use HasMedia;
    use OrderByScope;
    // use TranslatableHelper;
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
        'active',
    ];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = TagFilter::class;




    protected static function newFactory()
    {
        return \Modules\News\Database\factories\TagFactory::new();
    }


}
