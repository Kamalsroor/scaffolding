<?php

namespace Modules\Product\Entities;

use App\Models\Scope\OrderByScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Http\Filters\ProductFilter;
class ProductSection extends Model
{
    use HasFactory;
    use SoftDeletes;
    use OrderByScope;
    public $timestamps = false;

    protected $casts = [
      'inputs' => 'array',
      'complaed_html' => 'array',
    ];



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'order_id',
        'section_id',
        'inputs',
        'html',
        'complaed_html',
    ];





}
