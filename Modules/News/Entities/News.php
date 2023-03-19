<?php

namespace Modules\News\Entities;

use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\News\Http\Filters\NewsFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class News extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    // use Translatable;
    use HasMedia;
    use OrderByScope;

    public $with = ['media'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'title','description','mini_description',
        'date',
        'order_id',
        'active',
        'category_id',
        'language',
    ];




    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = NewsFilter::class;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected static function newFactory()
    {
        return \Modules\News\Database\factories\NewsFactory::new();
    }


}
