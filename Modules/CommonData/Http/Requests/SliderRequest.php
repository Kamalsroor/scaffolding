<?php

namespace Modules\CommonData\Http\Requests;

use App\Rules\TranslationRole;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            $slider = $this->route()->parameter('slider');
            return [
                'title' => ['required','array',new TranslationRole],
                'sub_title' => ['required','array',new TranslationRole],
                'button_title' => ['required','array',new TranslationRole],
                'link' => ['required'],
                'img' => ['required','exists:media,id'],
                'order_id' => ['required','numeric','min:1'],
                'active' => ['required','boolean'],
            ];
        }else{
            return [
              'title' => ['required','array',new TranslationRole],
              'sub_title' => ['required','array',new TranslationRole],
              'button_title' => ['required','array',new TranslationRole],
              'img' => ['required','exists:media,id'],
              'link' => ['required'],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
            ];
        }


    }
}
