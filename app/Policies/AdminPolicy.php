<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function viewAny($admin)
    {
        if ($admin->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $model
     * @return mixed
     */
    public function view($admin, Admin $model)
    {
        if ($admin->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function create($admin)
    {
        return false;
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $model
     * @return mixed
     */
    public function update($admin, Admin $model)
    {
        if ($admin->hasRole('admin') && $admin->id === $model->id) {
            return true;
        }
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $model
     * @return mixed
     */
    public function delete($admin, Admin $model)
    {
        return false;
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $model
     * @return mixed
     */
    public function restore($admin, Admin $model)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Admin  $model
     * @return mixed
     */
    public function forceDelete($admin, Admin $model)
    {
        //
    }
}
