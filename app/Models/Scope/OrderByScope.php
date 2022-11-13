<?php

namespace App\Models\Scope;

use Illuminate\Support\Facades\Schema;

trait OrderByScope
{


    public function scopeOrderd($query)
    {

        // if (Schema::connection($this->getConnectionName())->hasColumn($this->getTable(), 'order_id') || in_array("order_id", $this->getFillable())) {
        if ( in_array("order_id", $this->getFillable())) {
            $query->orderByRaw('ifnull(order_id, id)');
        }

    }


    public function scopeActived($query)
    {

        // if (Schema::connection($this->getConnectionName())->hasColumn($this->getTable(), 'active') || in_array("active", $this->getFillable())) {
        if ( in_array("active", $this->getFillable())) {
            $query->where('active' , true);
        }

    }


    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = $value ?? false;
    }

}
