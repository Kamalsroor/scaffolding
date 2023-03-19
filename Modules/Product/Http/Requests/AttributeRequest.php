<?php

namespace Modules\Product\Http\Requests;

use App\Rules\TranslationRole;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            $attribute = $this->route()->parameter('attribute');
            return [
              'name' => ['required','array',new TranslationRole],
              'parent_id' => ['required','numeric'],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
              'have_child' => ['required','boolean'],

            ];
        }else{
            return [
              'name' => ['required','array',new TranslationRole],
              'parent_id' => ['required','numeric'],
              'order_id' => ['required','numeric','min:1'],
              'active' => ['required','boolean'],
              'have_child' => ['required','boolean'],
            ];
        }


    }
}
