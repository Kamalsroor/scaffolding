<?php

namespace Modules\CommonData\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Media\HasMedia;
use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CommonData\Http\Filters\ContactUsFilter;
class ContactUs extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    use HasMedia;
    use OrderByScope;

    public $fillable = ['name','phone','email','description','show_date'];


    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = ContactUsFilter::class;




    protected static function newFactory()
    {
        return \Modules\CommonData\Database\factories\ContactUsFactory::new();
    }


}
