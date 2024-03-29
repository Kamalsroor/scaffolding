<?php

use App\Models\Media;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}


if (!function_exists('checkRole')) {

    function checkRole($permission)
    {
        return auth()->user()->can($permission);
    }
}


if (!function_exists('sumDiscount')) {
    function sumDiscount($price , $discount_type , $discount_value ){
        if($discount_type == 'percentage'){
          return $price - ($price * $discount_value / 100);
        }else{
          return $price - $discount_value ;
        }
    }
}


if (!function_exists('isJson')) {

  /**
     * chech if sting is Json.
     *
     * @return Boolean
     */
    function isJson($string) {
        if(is_array($string)){
            return false;
        }
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
     }
}

if (!function_exists('getDatabase')) {

    function getDatabase($model)
    {
        if($model->getConnectionName() == 'tenant'){
            return session()->get('server_database');
        }else{
            return null;
        }
    }
}



if (!function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Models\Setting();
        }

        if (is_array($key)) {
            return \App\Models\Setting::set($key[0], $key[1]);
        }

        $value = \App\Models\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}


if (!function_exists('is_true')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function is_true($val, $return_null=false)
    {
        $boolval = ( is_string($val) ? filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool) $val );
        return ( $boolval===null && !$return_null ? false : $boolval );
    }
}


if (!function_exists('getAllSettingsWithValues')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function getAllSettingsWithValues($page)
    {
        $newArray = [];
        $allSettings = \Modules\Setting\Entities\Setting::getDefinedSetting($page);

        if($page){
          $newArray[$page] = getSettingsValues($allSettings);
        }else{
          foreach ($allSettings as $key_level_1 => $settings_level_1) {
            $newArray[$key_level_1] = getSettingsValues($settings_level_1);
          }
        }

        return $newArray;
    }
}


if (!function_exists('columnFilters')) {


    /**
     * Filter the query by a given code.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
     function columnFilters($type ,$old_value, $value)
    {
        if ($value && $old_value) {
            switch ($type) {
                case 'like':
                    return (Str::contains(Str::lower($old_value),Str::lower( $value))) ;
                    break;
                case '=':
                    return (Str::lower($old_value) == Str::lower( $value)) ;
                    break;
                case '!=':
                    return (Str::lower($old_value) != Str::lower( $value)) ;
                    break;
                case '<':
                    return (Str::lower($old_value) < Str::lower( $value)) ;
                    break;
                case '<=':
                    return (Str::lower($old_value) <= Str::lower( $value)) ;
                    break;
                case '>':
                    return (Str::lower($old_value) > Str::lower( $value)) ;
                    break;
                case '>=':
                    return (Str::lower($old_value) >= Str::lower( $value)) ;
                    break;
                default:
                    return true;
                    break;
            }
        }

        return false;
    }
}


if (!function_exists('getSettingsValues')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function getSettingsValues($setting_fields)
    {


        $array = [];
        if (isset($setting_fields['elements'])) {
            foreach ($setting_fields['elements'] as $key => $element) {
                if ($element['type'] == 'img') {
                    $value = \Modules\Setting\Entities\Setting::get($element['name'], $element['value']);
                    if ($value) {
                        if(isset($value['id'])){
                            $full_url = Media::find($value['id']);
                            if(!$full_url){
                                $array[$element['name']] = "";
                            }else{
                                $array[$element['name']] = $full_url->full_url;
                            }
                        }
                    }else{
                      $array[$element['name']] = "";
                    }
                } else if ($element['type'] == 'list') {
                    $array[$element['name']] = getSettingsValues($element);
                } else {
                  $array[$element['name']] = \Modules\Setting\Entities\Setting::get($element['name'], $element['value']);


                  if(isset($element['has_translate']) &&  $element['has_translate'] == true && is_array($array[$element['name']])){
                    $array[$element['name']] =  isset($array[$element['name']][app()->currentLocale()])  ? $array[$element['name']][app()->currentLocale()] : reset($array[$element['name']]);
                  }
                }

            }
        }

        if (isset($setting_fields['section'])) {
            foreach ($setting_fields['section'] as $key => $element) {
                $array[$key] = getSettingsValues($element);
            }
        }

        if (isset($setting_fields['inputs'])) {
            $setting_fields['value'] = \Modules\Setting\Entities\Setting::get($setting_fields['name'], $setting_fields['value']);

            foreach ($setting_fields['inputs'] as $input_key => $input) {
                foreach ($setting_fields['value'] as $key => $value) {

                    if ($input['type'] == 'img') {

                      if (isset($value[$input['name']]) && $value[$input['name']] != 'null') {
                            $media = Media::find(isset($value[$input['name']]['id']) ? $value[$input['name']]['id'] : $value[$input['name']]);
                            $array[$key][$input['name']] = $media ? $media->full_url : null;
                        } else {
                            $array[$key][$input['name']] = null;
                        }
//                        $array[$key][$input['ame']] = $value[$input['name']] != 'null' ? ();
                    } else {
                        $array[$key][$input['name']] = $value[$input['name']] != 'null' ? $value[$input['name']] : null;
                    }
                }
            }
        }

        return $array;
    }
}


if (!function_exists('get_domain')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function get_domain($host)
    {
        $domain = explode('.', $host);
        unset($domain[0]);
        return implode(".", $domain);
    }
}

if (!function_exists('get_sub_domain')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function get_sub_domain($host)
    {
        $domain = explode('.', $host);
        return $domain[0];
    }
}

if (!function_exists('get_table_settings')) {
    function get_table_settings($table, $attr, $default = false)
    {
        $stting = Setting::get($table);
        $user_id = Auth()->user()->id;
        return isset($stting['table_attribute'][$user_id][$attr]) ? filter_var($stting['table_attribute'][$user_id][$attr], FILTER_VALIDATE_BOOLEAN) : $default;
    }
}

if (!function_exists('app_copyright')) {
    /**
     * Get the application copyright.
     *
     * @return string
     */
    function app_copyright()
    {
        return Settings::locale()->get('copyright');
    }
}
if (!function_exists('app_name')) {
    /**
     * Get the application name.
     *
     * @return string
     */
    function app_name()
    {
        return Settings::locale()
            ->get('name', config('app.name', 'Laravel'))
            ?: config('app.name', 'Laravel');
    }
}

if (!function_exists('app_name')) {

    function changeConnection($tenant)
    {
        DB::purge();

        Config::set('database.default', 'tenant');

        Config::set('database.connections.tenant.database', $tenant->database);

        // Config::set('database.default', 'main');
    }
}

if (!function_exists('routex')) {


    function routex($route, $params = null)
    {
        $tenant = getTenantName();

        return route('tenant.' . $route, [$tenant, $params]);
    }
}


if (!function_exists('getTenantName')) {

    function getTenantName()
    {

        // $url = Url::current();
        $url = request()->getHost();
        $urlArray = explode('.', $url);

        if (sizeof($urlArray) === 3 && in_array($urlArray[1] , ['ap' , 'dashboard'])) {

            $tenantArray = explode('//', $urlArray[0]);

            $tenant = $tenantArray[1];

            return $tenant === 'admin' ? null : $tenant;
        }

        return null;
    }


}

if (!function_exists('app_logo')) {
    /**
     * Get the application logo url.
     *
     * @return string
     */
    function app_logo()
    {
        if (($model = Settings::instance('logo')) && $file = $model->getFirstMediaUrl('logo')) {
            return $file;
        }

        return 'https://ui-avatars.com/api/?name=' . rawurldecode(config('app.name')) . '&bold=true';
    }
}


if (!function_exists('app_logo_light')) {
    /**
     * Get the application logo url.
     *
     * @return string
     */
    function app_logo_light()
    {
        if (($model = Settings::instance('logo_light')) && $file = $model->getFirstMediaUrl('logo_light')) {
            return $file;
        }

        return 'https://ui-avatars.com/api/?name=' . rawurldecode(config('app.name')) . '&bold=true';
    }
}

if (!function_exists('array_unset_by_value')) {
    /**
     * unset value from array .
     *
     * @return string
     */
    function array_unset_by_value($array, $value)
    {
        if (($key = array_search($value, $array)) !== false) {
            unset($array[$key]);
        }
    }
}


if (!function_exists('generateRandomString')) {
    /**
     * Get the application logo url.
     *
     * @return string
     */

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('str_limit')) {
    /**
     * str limit of string
     *
     * @return string
     */

    function str_limit($string, $limit = 150, $end = '...')
    {
        return Str::limit($string, $limit, $end);

    }
}

// if (! function_exists('setting_get')) {
//     /**
//      * str limit of string
//      *
//      * @return string
//      */


//     function setting_get($key)
//     {
//         $dayTime = 60*60*24 ;
//         return Cache::remember('faqs',$dayTime  , function() use($key){
//            return Settings::get($key);
//         });
//         // return Str::limit($string, $limit ,$end) ;

//     }
// }


if (!function_exists('app_favicon')) {
    /**
     * Get the application favicon url.
     *
     * @return string
     */
    function app_favicon()
    {
        if (($model = Settings::instance('favicon')) && $file = $model->getFirstMediaUrl('favicon')) {
            return $file;
        }

        return '/favicon.ico';
    }
}

if (!function_exists('meme_type_to_ex')) {
    /**
     * Format numbers to nearest thousands such as
     * Kilos, Millions, Billions, and Trillions with comma.
     *
     * @param int|float $num
     * @return float|string
     */
    function meme_type_to_ex($type)
    {
        $meme_types = [
            'application/bmp' => 'bmp',
            'application/cdr' => 'cdr',
            'application/coreldraw' => 'cdr',
            'application/excel' => 'xl',
            'application/gpg-keys' => 'gpg',
            'application/java-archive' => 'jar',
            'application/json' => 'json',
            'application/mac-binary' => 'bin',
            'application/mac-binhex' => 'hqx',
            'application/mac-binhex40' => 'hqx',
            'application/mac-compactpro' => 'cpt',
            'application/macbinary' => 'bin',
            'application/msexcel' => 'xls',
            'application/msword' => 'doc',
            'application/octet-stream' => 'pdf',
            'application/oda' => 'oda',
            'application/ogg' => 'ogg',
            'application/pdf' => 'pdf',
            'application/pgp' => 'pgp',
            'application/php' => 'php',
            'application/pkcs-crl' => 'crl',
            'application/pkcs10' => 'p10',
            'application/pkcs7-mime' => 'p7c',
            'application/pkcs7-signature' => 'p7s',
            'application/pkix-cert' => 'crt',
            'application/pkix-crl' => 'crl',
            'application/postscript' => 'ai',
            'application/powerpoint' => 'ppt',
            'application/rar' => 'rar',
            'application/s-compressed' => 'zip',
            'application/smil' => 'smil',
            'application/videolan' => 'vlc',
            'application/vnd.google-earth.kml+xml' => 'kml',
            'application/vnd.google-earth.kmz' => 'kmz',
            'application/vnd.mif' => 'mif',
            'application/vnd.mpegurl' => 'm4u',
            'application/vnd.ms-excel' => 'xlsx',
            'application/vnd.ms-office' => 'ppt',
            'application/vnd.ms-powerpoint' => 'ppt',
            'application/vnd.msexcel' => 'csv',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'application/wbxml' => 'wbxml',
            'application/wmlc' => 'wmlc',
            'application/x-binary' => 'bin',
            'application/x-binhex40' => 'hqx',
            'application/x-bmp' => 'bmp',
            'application/x-cdr' => 'cdr',
            'application/x-compress' => 'z',
            'application/x-compressed' => '7zip',
            'application/x-coreldraw' => 'cdr',
            'application/x-director' => 'dcr',
            'application/x-dos_ms_excel' => 'xls',
            'application/x-dvi' => 'dvi',
            'application/x-excel' => 'xls',
            'application/x-gtar' => 'gtar',
            'application/x-gzip' => 'gzip',
            'application/x-gzip-compressed' => 'tgz',
            'application/x-httpd-php' => 'php',
            'application/x-httpd-php-source' => 'php',
            'application/x-jar' => 'jar',
            'application/x-java-application' => 'jar',
            'application/x-javascript' => 'js',
            'application/x-mac-binhex40' => 'hqx',
            'application/x-macbinary' => 'bin',
            'application/x-ms-excel' => 'xls',
            'application/x-msdownload' => 'exe',
            'application/x-msexcel' => 'xls',
            'application/x-pem-file' => 'pem',
            'application/x-photoshop' => 'psd',
            'application/x-php' => 'php',
            'application/x-pkcs10' => 'p10',
            'application/x-pkcs12' => 'p12',
            'application/x-pkcs7' => 'rsa',
            'application/x-pkcs7-certreqresp' => 'p7r',
            'application/x-pkcs7-mime' => 'p7c',
            'application/x-pkcs7-signature' => 'p7a',
            'application/x-rar' => 'rar',
            'application/x-rar-compressed' => 'rar',
            'application/x-shockwave-flash' => 'swf',
            'application/x-stuffit' => 'sit',
            'application/x-tar' => 'tar',
            'application/x-troff-msvideo' => 'avi',
            'application/x-win-bitmap' => 'bmp',
            'application/x-x509-ca-cert' => 'crt',
            'application/x-x509-user-cert' => 'pem',
            'application/x-xls' => 'xls',
            'application/x-zip' => 'zip',
            'application/x-zip-compressed' => 'zip',
            'application/xhtml+xml' => 'xhtml',
            'application/xls' => 'xls',
            'application/xml' => 'xml',
            'application/xspf+xml' => 'xspf',
            'application/zip' => 'zip',
            'audio/ac3' => 'ac3',
            'audio/aiff' => 'aif',
            'audio/midi' => 'mid',
            'audio/mp3' => 'mp3',
            'audio/mp4' => 'm4a',
            'audio/mpeg' => 'mp3',
            'audio/mpeg3' => 'mp3',
            'audio/mpg' => 'mp3',
            'audio/ogg' => 'ogg',
            'audio/wav' => 'wav',
            'audio/wave' => 'wav',
            'audio/x-acc' => 'aac',
            'audio/x-aiff' => 'aif',
            'audio/x-au' => 'au',
            'audio/x-flac' => 'flac',
            'audio/x-m4a' => 'm4a',
            'audio/x-ms-wma' => 'wma',
            'audio/x-pn-realaudio' => 'ram',
            'audio/x-pn-realaudio-plugin' => 'rpm',
            'audio/x-realaudio' => 'ra',
            'audio/x-wav' => 'wav',
            'font/otf' => 'otf',
            'font/ttf' => 'ttf',
            'font/woff' => 'woff',
            'font/woff2' => 'woff2',
            'image/bmp' => 'bmp',
            'image/cdr' => 'cdr',
            'image/gif' => 'gif',
            'image/jp2' => 'jp2',
            'image/jpeg' => 'jpeg',
            'image/jpm' => 'jp2',
            'image/jpx' => 'jp2',
            'image/ms-bmp' => 'bmp',
            'image/pjpeg' => 'jpeg',
            'image/png' => 'png',
            'image/svg+xml' => 'svg',
            'image/tiff' => 'tiff',
            'image/vnd.adobe.photoshop' => 'psd',
            'image/vnd.microsoft.icon' => 'ico',
            'image/webp' => 'webp',
            'image/x-bitmap' => 'bmp',
            'image/x-bmp' => 'bmp',
            'image/x-cdr' => 'cdr',
            'image/x-ico' => 'ico',
            'image/x-icon' => 'ico',
            'image/x-ms-bmp' => 'bmp',
            'image/x-png' => 'png',
            'image/x-win-bitmap' => 'bmp',
            'image/x-windows-bmp' => 'bmp',
            'image/x-xbitmap' => 'bmp',
            'message/rfc822' => 'eml',
            'multipart/x-zip' => 'zip',
            'text/calendar' => 'ics',
            'text/comma-separated-values' => 'csv',
            'text/css' => 'css',
            'text/html' => 'html',
            'text/json' => 'json',
            'text/php' => 'php',
            'text/plain' => 'txt',
            'text/richtext' => 'rtx',
            'text/rtf' => 'rtf',
            'text/srt' => 'srt',
            'text/vtt' => 'vtt',
            'text/x-comma-separated-values' => 'csv',
            'text/x-log' => 'log',
            'text/x-php' => 'php',
            'text/x-scriptzsh' => 'zsh',
            'text/x-vcard' => 'vcf',
            'text/xml' => 'xml',
            'text/xsl' => 'xsl',
            'video/3gp' => '3gp',
            'video/3gpp' => '3gp',
            'video/3gpp2' => '3g2',
            'video/avi' => 'avi',
            'video/mj2' => 'jp2',
            'video/mp4' => 'mp4',
            'video/mpeg' => 'mpeg',
            'video/msvideo' => 'avi',
            'video/ogg' => 'ogg',
            'video/quicktime' => 'mov',
            'video/vnd.rn-realvideo' => 'rv',
            'video/webm' => 'webm',
            'video/x-f4v' => 'f4v',
            'video/x-flv' => 'flv',
            'video/x-ms-asf' => 'wmv',
            'video/x-ms-wmv' => 'wmv',
            'video/x-msvideo' => 'avi',
            'video/x-sgi-movie' => 'movie',
            'zz-application/zz-winassoc-cdr' => 'cdr',
        ];


        return isset($meme_types[$type]) ? $meme_types[$type] : null;
    }
}


if (!function_exists('count_formatted')) {
    /**
     * Format numbers to nearest thousands such as
     * Kilos, Millions, Billions, and Trillions with comma.
     *
     * @param int|float $num
     * @return float|string
     */
    function count_formatted($num)
    {
        if ($num >= 1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = ['K', 'M', 'B', 'T'];
            $x_count_parts = count($x_array) - 1;
            $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;
        }

        return $num;
    }
}

if (!function_exists('active_navbar')) {
    /**
     * str limit of string
     *
     * @return string
     */

    function active_navbar($route)
    {

        return Route::currentRouteName() == $route ? "active" : " ";

    }
}


if (!function_exists('IsNullOrEmptyString')) {
    /**
     * str limit of string
     *
     * @return string
     */

    function IsNullOrEmptyString($str)
    {
        return ($str === null || trim($str) === '' || $str === 'null');
    }
}
if (!function_exists('getIp')) {
    function getIp()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}

if (!function_exists('handelVueTamplate')) {
  function handelVueTamplate($vue ,array $inputs)
  {
    $inputs = collect($inputs);
      $html = $vue;
      $VainalHtml = [];
      $locales = config('translatable.locales');

      foreach($locales as $local){
        $VainalHtml[$local] = $html;
          if(Str::contains($VainalHtml[$local], ':style')){
            $VainalHtml[$local] = handelStyles($VainalHtml[$local] , $inputs);
          }

          if(Str::contains($VainalHtml[$local], 'v-html')){
            $VainalHtml[$local] = handelVHtml($VainalHtml[$local] , $inputs , $local);
          }

          $VainalHtml[$local] = handelVars($VainalHtml[$local] , $inputs , $local);


        if(Str::contains($VainalHtml[$local], ':src')){
          $VainalHtml[$local] = handelVSrc($VainalHtml[$local] , $inputs);
        }

         $VainalHtml[$local] = Str::replace('+', '', $VainalHtml[$local]);
         //  $VainalHtml[$local] = Str::replace('', '', $VainalHtml[$local]);
         $VainalHtml[$local] = Str::squish($VainalHtml[$local]);
      }

      return $VainalHtml;
  }
}


if (!function_exists('handelVSrc')) {
  function handelVSrc($html , $inputs , $index = 0)
  {

    $converted = Str::of($html)->betweenFirst(':src="', '"');

        $var = Str::replace(' ', '', $converted);

        if(Str::contains($var, '.')){
          // $vars = array_map('intval', explode('.', $var));
          $vars = explode('.' ,$var);
          $var_value = null;
          foreach ($vars as $key => $value) {
            # code...
            if($key === 0){

              $object = $inputs->where('name' , $value)->first();
              if($object){
                $var_value = $object;
              }else{
                $var_value = "";
              }
            }else{
              if($var_value != null && $var_value != '' && is_array($var_value) && isset($var_value['value'])){
                $var_value = $var_value['value'][$value];
              }
            }
          }

          // $converted = Str::replace($var, "'" . $var_value . "'", $converted);
        }else{
          $object = $inputs->where('name' , $var)->first();
          $var_value = $object['value'];
          // $converted = Str::replace($var,   $var_value  , $converted);
        }
        // $html = Str::replace($converted_old . '}', $converted , $html);
        $html = Str::replace($var, $var_value , $html);

      $html = Str::replaceFirst(':src', 'src' , $html);

      if(Str::contains($html, ':src')){
        $html = handelVSrc($html , $inputs , $index + 1);
      }
      return $html;
  }
}

if (!function_exists('handelVHtml')) {
  function handelVHtml($html , $inputs ,$local, $index = 0)
  {

      $is_local = false ;

        $converted_old = Str::of($html)->betweenFirst('{!!', '!!}');
        $converted = '{!!' .  $converted_old . '!!}';
        $var = Str::replace(' ', '', $converted_old);

        if(Str::contains($var, '.')){
          // $vars = array_map('intval', explode('.', $var));
          $vars = explode('.' ,$var);
          $var_value = null;
          foreach ($vars as $key => $value) {
            # code...
            if($key === 0){

              $object = $inputs->where('name' , $value)->first();
              if($object){
                $var_value = $object;
              }else{
                $var_value = "";
              }
            }else{
              if($var_value != null && $var_value != '' && is_array($var_value) && isset($var_value['value'])){
                $var_value = $var_value['value'][$value];
              }
            }
          }
          if(Str::contains($var, '[local]')){
            $is_local = true ;
            $new_var = Str::replace("[local]", "", $var);
          }
          $object = $inputs->where('name' , $new_var)->first();
          $var_value = $object['value'];
          if(is_array($var_value) && count($var_value) > 0 && $is_local){
            if(isset($var_value[$local])){
              $var_value = $var_value[$local];
            }else{
              $var_value = reset($var_value);

            }
          }
          // $converted = Str::replace($var, "'" . $var_value . "'", $converted_old);
        }else{
          // $object = $inputs->where('name' , $var)->first();
          // $var_value = $object['value'];

          if(Str::contains($var, '[local]')){
            $is_local = true ;
            $new_var = Str::replace("[local]", "", $var);
          }
          $object = $inputs->where('name' , $new_var)->first();
          $var_value = $object['value'];

          $last_var_value = $var_value ;
          if(is_array($var_value) && count($var_value) > 0 && $is_local){
            if(isset($var_value[$local])){
              $last_var_value = $var_value[$local];
            }else{
              $last_var_value = reset($var_value);
            }
          }

          // $converted = Str::replace($var,   $var_value  , $converted_old);
        }

        $html = Str::replace($converted, $last_var_value , $html);
        $html = Str::replaceFirst('v-html', 'vhtml' , $html);

      if(Str::contains($html, 'v-html')){
        $html = handelVHtml($html , $inputs , $index + 1);
      }
      return $html;
  }
}


if (!function_exists('handelStyles')) {
  function handelStyles($html , $inputs , $index = 0)
  {

   // dd($var);
    $converted_old = Str::of($html)->betweenFirst(':style', '}"');

    if(Str::startsWith($converted_old, '=')){
      $converted = Str::replace('{', '', $converted_old);
      $converted = Str::replace('}', '', $converted);
      $converted = Str::replace('\'', '', $converted);

      if($var = Str::of($converted)->betweenFirst('+', '+')){
        $var = Str::replace(' ', '', $var);

        if(Str::contains($var, '.')){
          // $vars = array_map('intval', explode('.', $var));
          $vars = explode('.' ,$var);
          $var_value = null;
          foreach ($vars as $key => $value) {
            # code...
            if($key === 0){

              $object = $inputs->where('name' , $value)->first();
              if($object){
                $var_value = $object;
              }else{
                $var_value = "";
              }
            }else{
              if($var_value != null && $var_value != '' && is_array($var_value) && isset($var_value['value'])){
                $var_value = $var_value['value'][$value];
              }
            }
          }

          $converted = Str::replace($var, "'" . $var_value . "'", $converted);
        }else{
          $object = $inputs->where('name' , $var)->first();

          $var_value = isset($object['value']) ? $object['value'] : '';
          $converted = Str::replace($var,   $var_value  , $converted);
        }
        $html = Str::replace($converted_old . '}', $converted , $html);

      }

      $html = Str::replaceFirst(':style', 'style' , $html);

      if(Str::contains($html, ':style')){
        $html = handelStyles($html , $inputs , $index + 1);
      }
      return $html;
    }
  }
}

if (!function_exists('handelVars')) {
  function handelVars($html , $inputs, $local , $index  = 0)
  {


    $converted_old = Str::of($html)->betweenFirst('{{', '}}');
    $is_local = false ;

    if($converted_old != null && $converted_old != ''){

      $converted = Str::replace('{{', '', $converted_old);
      $converted = Str::replace('}}', '', $converted);
      // dd($converted);
      $var = Str::replace(' ', '', $converted);

        if(Str::contains($var, '.')){
          // $vars = array_map('intval', explode('.', $var));
          $vars = explode('.' ,$var);
          $var_value = null;
          foreach ($vars as $key => $value) {
            # code...
            if($key === 0){

              $object = $inputs->where('name' , $value)->first();
              if($object){
                $var_value = $object;
              }else{
                $var_value = "";
              }
            }else{

              if($var_value != null && $var_value != '' && is_array($var_value) && isset($var_value['value'])){
                $var_value = $var_value['value'][$value];
              }
            }
          }
          if(Str::contains($var, '[local]')){
            $is_local = true ;
            $new_var = Str::replace("[local]", "", $var);
          }
          $object = $inputs->where('name' , $new_var)->first();
          $var_value = $object['value'];
          if(is_array($var_value) && count($var_value) > 0 && $is_local){
            if(isset($var_value[$local])){
              $var_value = $var_value[$local];
            }else{
              $var_value = reset($var_value);
            }
          }

          $converted = Str::replace($var, $var_value , $converted);
        }else{
          $new_var = $var;

          if(Str::contains($var, '[local]')){
            $is_local = true ;
            $new_var = Str::replace("[local]", "", $var);
          }
          $object = $inputs->where('name' , $new_var)->first();
          $var_value = $object['value'];
          if(is_array($var_value) && count($var_value) > 0 && $is_local){
            if(isset($var_value[$local])){
              $var_value = $var_value[$local];
            }else{
            $var_value = reset($var_value);

            }
          }
          $converted = Str::replace($var, $var_value, $converted);
        }

        $html = Str::replace('{{' . $converted_old . '}}', $converted , $html);

        if(Str::contains($html, '{{')){
          $html = handelVars($html , $inputs , $local, $index + 1);
        }

      return $html;
    }
  }
}

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
if (!function_exists('pathToUploadedFile')) {

  /**
   * Create an UploadedFile object from absolute path
   *
   * @param     string $path
   * @param     bool $test default true
   * @return    object(Illuminate\Http\UploadedFile)
   *
   * Based of Alexandre Thebaldi answer here:
   * https://stackoverflow.com/a/32258317/6411540
   */
   function pathToUploadedFile( $path, $test = true ) {
      $filesystem = new Filesystem;

      $name = $filesystem->name( $path );
      $extension = $filesystem->extension( $path );
      $originalName = $name . '.' . $extension;
      $mimeType = $filesystem->mimeType( $path );
      $error = null;

      return new UploadedFile( $path, $originalName, $mimeType, $error, $test );
  }
}
