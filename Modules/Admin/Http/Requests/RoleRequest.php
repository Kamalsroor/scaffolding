<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $role = $this->route()->parameter('role');
            return [
                'name' => ['required','string' , 'max:255' , 'unique:'.config('permission.table_names.roles').',name,'. $role],
                'permissions' => ['required', 'array','min:1'],
            ];
        }else{
            return [
                'name' => ['required','string' , 'max:255' , 'unique:'.config('permission.table_names.roles').',name'],
                'permissions' => ['required', 'array','min:1'],
            ];
        }


    }
}
