<?php

namespace Modules\CommonData\Http\Requests;

use App\Rules\TranslationRole;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            $service = $this->route()->parameter('service');
            return [
                'title' => ['required','array',new TranslationRole],
                'description' => ['required','array',new TranslationRole],
                'img' => ['required','exists:media,id'],
                'order_id' => ['required','numeric','min:1'],
                'active' => ['required','boolean'],

            ];
        }else{
            return [
              'title' => ['required','array',new TranslationRole],
              'description' => ['required','array',new TranslationRole],
              'img' => ['required','exists:media,id'],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
            ];
        }


    }
}
