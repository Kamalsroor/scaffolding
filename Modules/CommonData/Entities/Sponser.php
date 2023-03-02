<?php

namespace Modules\CommonData\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\SponserFilter;

class Sponser extends Model
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
    protected $filter = SponserFilter::class;




    protected static function newFactory()
    {
        return \Modules\CommonData\Database\factories\SponserFactory::new();
    }

}
