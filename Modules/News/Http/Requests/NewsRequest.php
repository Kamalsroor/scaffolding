<?php

namespace Modules\News\Http\Requests;

use App\Rules\TranslationRole;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            $news = $this->route()->parameter('news');
            return [
                'title' => ['required','string'],
                'description' => ['required','string'],
                'mini_description' => ['required','string'],
                'date' => ['required','date'],
                'language' => ['required','string','min:1','max:10'],
                'order_id' => ['required','numeric'],
                'active' => ['nullable','boolean'],
                'category_id' => ['nullable','exists:categories,id'],
                'tags' => ['nullable','array'],
                'tags.*' => ['exists:tags,id'],

            ];
        }else{
            return [
              'title' => ['required','string'],
              'description' => ['required','string'],
              'mini_description' => ['required','string'],
              'date' => ['required','date'],
              'language' => ['required','string','min:1','max:10'],
              'order_id' => ['required','numeric'],
              'active' => ['nullable','boolean'],
              'category_id' => ['nullable','exists:categories,id'],
              'tags' => ['nullable','array'],
              'tags.*' => ['exists:tags,id'],
            ];
        }


    }
}
