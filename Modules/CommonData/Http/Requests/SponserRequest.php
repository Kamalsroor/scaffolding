<?php

namespace Modules\CommonData\Http\Requests;

use App\Rules\TranslationRole;
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
                'name' => ['required','array',new TranslationRole],
                'img' => ['required','exists:media,id'],
                'order_id' => ['required','numeric','min:1'],
                'active' => ['required','boolean'],
                'is_feature' => ['required','boolean'],

            ];
        }else{
            return [
              'name' => ['required','array',new TranslationRole],
                'img' => ['required','exists:media,id'],
                'order_id' => ['required','numeric','min:1'],
                'active' => ['required','boolean'],
                'is_feature' => ['required','boolean'],

            ];
        }


    }
}
