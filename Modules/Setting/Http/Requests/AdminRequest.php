<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            $setting = $this->route()->parameter('setting');
            return [
                'name' => ['required','string'],
                'email' => ['required','email' , 'max:255' , 'unique:settings,email,'. $setting],
                'role' => ['required','exists:'.config('permission.table_names.roles').',id'],
                'password' => ['required' , 'max:255' ,'string'],
                // 'order_id' => ['required','numeric','min:1'],
            ];
        }else{
            return [
                'name' => ['required','string'],
                'email' => ['required','email' ,'unique:settings,email', 'max:255'],
                'role' => ['required','exists:'.config('permission.table_names.roles').',id'],
                'password' => ['required' , 'max:255' ,'string'],
                // 'order_id' => ['required','numeric','min:1'],
            ];
        }


    }
}
