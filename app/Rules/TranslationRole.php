<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TranslationRole implements Rule
{

    private $lang = '';



    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $values)
    {

      $locales = config('translatable.locales');
      if(count($locales) != count($values)){
        return false;
      }
      foreach ($values as $key => $value) {
        if(in_array($key  , $locales)){
          if(IsNullOrEmptyString($value)){
            $this->lang = $key;
            return false;
          }
        }else{
          return false;
        }
      }


        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be inclodes ' . $this->lang;
    }
}
