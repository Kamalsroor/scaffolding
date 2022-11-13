<?php

namespace Modules\CommonData\Entities;

use App\Http\Filters\CountryFilter;
use App\Http\Filters\Filterable;
use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use App\Models\Slug\SlugOptions;
use App\Models\Traits\HasConnationLandLoad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Database\Factories\CountryFactory;
use Schema;

class Country extends Model
{
    use HasFactory;
    use Filterable;
    use HasMedia;
    use OrderByScope;
    use SoftDeletes;



    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media',
    ];

    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = CountryFilter::class;


    protected $fillable = [
        'name',
        'key',
        'code',
        'order_id',
        'active',
    ];



    protected $casts = [
        'active' => 'boolean'
    ];


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CountryFactory::new();
    }




}
