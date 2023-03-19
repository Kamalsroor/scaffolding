<?php

namespace Modules\Product\Http\Requests;

use App\Rules\TranslationRole;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            return [
              'name' => ['required','array',new TranslationRole],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
              'img' => ['required','exists:media,id'],
              'file' => ['nullable','exists:media,id'],
              'attributes_final' => ['required','array' ,'min:1'],
              'attributes_final.*.id' => ['required','exists:attributes,id'],
              'attributes_final.*.value' => ['required_with:attributes_final.*.id', 'array',new TranslationRole],
              'video' => ['nullable','array'],
              'video.*.id' => ['nullable','exists:media,id'],
              'video.*.thumbnail_id' => ['nullable','exists:media,id'],
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
              'file' => ['nullable','exists:media,id'],
              'attributes_final' => ['required','array' ,'min:1'],
              'attributes_final.*.id' => ['required','exists:attributes,id'],
              'attributes_final.*.value' => ['required_with:attributes_final.*.id', 'array',new TranslationRole],
              'video' => ['nullable','array' ,'min:1'],
              'video.*.id' => ['nullable','exists:media,id'],
              'video.*.thumbnail_id' => ['nullable','exists:media,id'],
              'sections' => ['required','array'],
              'sections.*.inputs' => ['required','array'],
              'sections.*.html' => ['required','string'],
            ];
        }


    }
}
