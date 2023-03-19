<?php

namespace Modules\CommonData\Entities;

use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\SubscribeFilter;
class Subscribe extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    use OrderByScope;

    public $fillable = ['email'];



    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = SubscribeFilter::class;




    protected static function newFactory()
    {
        return \Modules\CommonData\Database\factories\SubscribeFactory::new();
    }

}
