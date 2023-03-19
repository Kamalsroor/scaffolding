<?php

namespace Modules\CommonData\Entities;

use App\Models\Traits\TranslatableHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\SponserFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Sponser extends Model implements TranslatableContract
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
    public $translatedAttributes = ['name'];
    public $with = ['translations','media'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_feature',
        'active',
        'order_id',
    ];



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $casts = [
      'is_feature' => 'boolean',
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

    public function scopeFeatured($query)
    {

        if ( in_array("is_feature", $this->getFillable())) {
            $query->where('is_feature' , true);
        }

    }


    // public function setIsFeatureAttribute($value)
    // {
    //     $this->attributes['is_feature'] = $value ?? false;
    // }

}
