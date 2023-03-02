<?php

namespace Modules\CommonData\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponserRequest extends FormRequest
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
            $sponser = $this->route()->parameter('sponser');
            return [
                'name' => ['required','string'],
                'email' => ['required','email' , 'max:255' , 'unique:sponsers,email,'. $sponser],
                'role' => ['required','exists:'.config('permission.table_names.roles').',id'],
                'password' => ['required' , 'max:255' ,'string'],
                // 'order_id' => ['required','numeric','min:1'],
            ];
        }else{
            return [
                'name' => ['required','string'],
                'email' => ['required','email' ,'unique:sponsers,email', 'max:255'],
                'role' => ['required','exists:'.config('permission.table_names.roles').',id'],
                'password' => ['required' , 'max:255' ,'string'],
                // 'order_id' => ['required','numeric','min:1'],
            ];
        }


    }
}
