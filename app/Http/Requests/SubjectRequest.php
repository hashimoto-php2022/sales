<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //'input.isbn_code' => 'required|max:13',
            'isbn_code' => 'required|max:13',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'isbn_code.required' => 'ISBN番号は必ず入力してください',
            'title.required' => '教科書の名前は必ず入力してください',
            'author.required' => '著者名は必ず入力してください',
            'price.required' => '価格は必ず入力してください'
        ];
    }
}
