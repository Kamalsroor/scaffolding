<?php

namespace Modules\Setting\Interfaces;

use App\Interfaces\CrudRepositoryInterface;

interface SettingRepositoryInterface extends CrudRepositoryInterface
{
  public function updateSettings(array $data, $validSettings , $page);

}
