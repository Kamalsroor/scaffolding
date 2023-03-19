<?php

namespace Modules\CommonData\Interfaces;

use App\Interfaces\CrudRepositoryInterface;

interface SponserRepositoryInterface extends CrudRepositoryInterface
{
  public function UpdateFeature($model, $is_feature);

}
