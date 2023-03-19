<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Schema;
use Astrotomic\Translatable\Translatable as BaseTranslatable;

trait TranslatableHelper
{

  public function fill(array $attributes)
  {
      foreach ($attributes as $key => $values) {
          if (
              $this->getLocalesHelper()->has($key)
              && is_array($values)
          ) {
              $this->getTranslationOrNew($key)->fill($values);
              unset($attributes[$key]);
          } else {
              [$attribute, $locale] = $this->getAttributeAndLocale($key);

              if (
                  $this->getLocalesHelper()->has($locale)
                  && $this->isTranslationAttribute($attribute)
              ) {

                foreach($values as $locale => $value){

                  $this->getTranslationOrNew($locale)->fill([$attribute => $value]);
                }
                  unset($attributes[$key]);
              }
          }
      }

      return parent::fill($attributes);
  }


  public function getTranslationsArrayByKey($key = null): array
  {
      $translations = [];
      $locales = config('translatable.locales');
      // if (\Request::is('api/v1/*'))
      // {
      //     // code
      // }
      if($this->isTranslationAttribute($key)){
        foreach ($this->translations as $translation) {
            // foreach ($this->translatedAttributes as $attr) {
              if(in_array($translation->{$this->getLocaleKey()} , $locales)){
                $translations[$translation->{$this->getLocaleKey()}] = $translation->{$key};
              }
            // }
        }
      }

      return $translations;
  }
}
