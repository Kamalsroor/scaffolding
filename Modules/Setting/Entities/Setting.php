<?php

namespace Modules\Setting\Entities;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Setting\Http\Filters\SettingFilter;
use Spatie\Permission\Traits\HasRoles;

class Setting extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Filterable;
    use SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'unhashed_password',
        'fcm_token'
    ];




    /**
     * The filter class name.
     *
     * @var string
     */
    protected $filter = SettingFilter::class;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
