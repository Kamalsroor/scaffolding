<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Schema;
use Astrotomic\Translatable\Translatable as BaseTranslatable;

trait Translatable
{

  public function isTranslationAttribute(string $key): bool
  {
    if(isset($this->translatedAttributes)){
      return in_array($key, $this->translatedAttributes);
    }
    return false;
  }

}
