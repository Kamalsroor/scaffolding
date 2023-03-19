<?php

namespace Modules\News\Entities;

use App\Models\Model;
use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\News\Http\Filters\TagFilter;
class NewsTranslation extends Model
{
    use SoftDeletes;
    use Translatable;

    public $timestamps = false;
    protected $fillable = ['title','description','mini_description'];



}
