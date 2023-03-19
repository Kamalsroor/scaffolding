<?php

namespace Modules\Setting\Http\Requests;

use App\Rules\TranslationRole;
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
              'name' => ['required','array',new TranslationRole],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
              'img' => ['required','exists:media,id'],
              'sections' => ['required','array'],
              'sections.*.inputs' => ['required','array'],
              'sections.*.html' => ['required','string'],
            ];
        }else{
            return [
              'name' => ['required','array',new TranslationRole],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
              'img' => ['required','exists:media,id'],
              'sections' => ['required','array'],
              'sections.*.inputs' => ['required','array'],
              'sections.*.html' => ['required','string'],
            ];
        }


    }
}
