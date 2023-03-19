<?php

namespace Modules\CommonData\Entities;

use App\Models\Model;
use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\SponserFilter;
class SponserTranslation extends Model
{
    use SoftDeletes;
    use Translatable;

    public $timestamps = false;
    protected $fillable = ['name'];



}
