<?php

namespace Modules\News\Http\Requests;

use App\Rules\TranslationRole;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            $tag = $this->route()->parameter('tag');
            return [
                'name' => ['required','array',new TranslationRole],
                'active' => ['required','boolean'],
            ];
        }else{
            return [
                'name' => ['required','array',new TranslationRole],
                'active' => ['required','boolean'],
            ];
        }


    }
}
