<?php

namespace Modules\Setting\Entities;

use App\Models\Media\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;
use Config;
class Setting extends Model
{
    use HasFactory;
    use HasMedia;


    public $with = ['media'];



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'name',
      'val',
      'type',
  ];

    /**
     * Add a settings value
     *
     * @param $key
     * @param $val
     * @param string $type
     * @return bool
     */
    public static function add($key, $val, $type = 'string')
    {
        if (self::has($key)) {
            return self::set($key, $val, $type);
        }


        return self::create(['name' => $key, 'val' => $val, 'type' => $type]) ? $val : false;
    }

    /**
     * Check if setting exists
     *
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return (boolean)self::getAllSettings()->whereStrict('name', $key)->count();
    }

    /**
     * Get all the settings
     *
     * @return mixed
     */
    public static function getAllSettings()
    {

        return Cache::rememberForever('settings.all', function() {
          return self::all();
        });

    }

    /**
     * Set a value for setting
     *
     * @param $key
     * @param $val
     * @param string $type
     * @return bool
     */
    public static function set($key, $val, $type = 'string')
    {

        if ($setting = self::getAllSettings()->where('name', $key)->first()) {

            return $setting->update([
                'name' => $key,
                'val' => $val,
                'type' => $type]) ? $val : false;
        }

        return self::add($key, $val, $type);
    }

    /**
     * Get a settings value
     *
     * @param $key
     * @param null $default
     * @return bool|int|mixed
     */
    public static function get($key, $default = null, $page = null)
    {


        if (self::has($key)) {
            $setting = self::getAllSettings()->where('name', $key)->first();
            return self::castValue($setting->val, $setting->type);
        }

        return self::castValue(self::getDefaultValue($key, $default), self::getDataType($key, $page));
    }

    /**
     * caste value into respective type
     *
     * @param $val
     * @param $castTo
     * @return bool|int
     */
    private static function castValue($val, $castTo)
    {

        try {

            switch ($castTo) {
                case 'int':
                case 'integer':
                    return intval($val);
                    break;

                case 'bool':
                case 'boolean':
                    return is_true($val);
                    break;
                case 'array':
                case 'date':
                case 'img':
                    if (is_array($val)) {
                        return $val;
                    }

                    return $val != false ? unserialize($val) : [];
                    break;
                case 'string':
                case 'text':
                  if (is_array($val)) {
                      return $val;
                  }
                  $unserialized = @unserialize($val);
                  if($unserialized != false){
                    return $unserialized;
                  }

                  return $val;
                  break;
                default:
                    return $val;
            }
        } catch (\Exception $exception) {
            dd($exception, $val, $castTo);
        }
    }

    /**
     * Get default value from config if no value passed
     *
     * @param $key
     * @param $default
     * @return mixed
     */
    private static function getDefaultValue($key, $default)
    {
        return is_null($default) ? self::getDefaultValueForField($key) : $default;
    }

    /**
     * Get default value for a setting
     *
     * @param $field
     * @return mixed
     */
    public static function getDefaultValueForField($field)
    {

        return self::getDefinedSettingFields()
            ->pluck('value', 'name')
            ->get($field);
    }

    /**
     * Get all the settings fields from config
     *
     * @return Collection
     */
    public static function getDefinedSettingFields($page = null , $tab = null)
    {

        if (isset(config('setting_fields')[$page]['section'])) {
            if($tab){
                return collect(config('setting_fields')[$page]['section'][$tab]['elements']);
            }
            return collect(config('setting_fields')[$page]['section'])->pluck('elements')->flatten(1);
        } else {
            if ($page) {
                return collect(config('setting_fields')[$page]['elements']);
            } else {
                $settingFields = config('setting_fields');
                foreach ($settingFields as $key => $value) {
                    if (isset($value['section'])) {
                        $settingFields[$key]['elements'] = [];
                        foreach ($value['section'] as $subkey => $subvalue) {
                            foreach ($subvalue['elements'] as $value) {
                                $settingFields[$key]['elements'][] = $value;
                            }
                        }
                    }
                }
                return collect($settingFields)->pluck('elements')->flatten(1);
            }

        }
    }

    /**
     * Get the data type of a setting
     *
     * @param $field
     * @return mixed
     */
    public static function getDataType($field, $page = null)
    {
        $type = self::getDefinedSettingFields($page)
            ->pluck('data', 'name')
            ->get($field);


        return is_null($type) ? 'string' : $type;
    }

    /**
     * Remove a setting
     *
     * @param $key
     * @return bool
     */
    public static function remove($key)
    {
        if (self::has($key)) {
            return self::whereName($key)->delete();
        }

        return false;
    }

    /**
     * Get the validation rules for setting fields
     *
     * @return array
     */
    public static function getValidationRules($page , $tab = null)
    {


        return self::getDefinedSettingFields($page , $tab)->pluck('rules', 'name')
            ->reject(function ($val) {
                return is_null($val);
            })->toArray();
    }

    // /**
    //  * Get all the settings
    //  *
    //  * @return mixed
    //  */
    // public static function getAllSettings()
    // {
    //     return self::all();
    // }

    /**
     * Get all the settings fields from config
     *
     * @return Collection
     */
    public static function getDefinedSetting($page = null)
    {
        if ($page) {
            return config('setting_fields')[$page];
        } else {
            return config('setting_fields');
        }
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            self::flushCache();
        });

        static::created(function () {
            self::flushCache();
        });
    }

    /**
     * Flush the cache
     */
    public static function flushCache()
    {
        Cache::forget('settings.all');
    }


}
