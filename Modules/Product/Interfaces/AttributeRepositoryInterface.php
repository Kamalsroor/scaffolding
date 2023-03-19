<?php

namespace Modules\Product\Interfaces;

use App\Interfaces\CrudRepositoryInterface;

interface AttributeRepositoryInterface extends CrudRepositoryInterface
{


  public function UpdateHaveChild($model, $have_child);

}
