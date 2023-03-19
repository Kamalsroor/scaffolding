<?php

namespace Modules\CommonData\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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

      return [
          'phone' => ['required','string'],
          'email' => ['required','email'],
          'name' => ['required','string','min:5','max:240'],
          'description' => ['required','string'],
          'show_date' => ['nullable','date'],
      ];
    }
}
