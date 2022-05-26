<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'isbn_code' => 'required|max:10|min:10',
            'title' => 'required',
            'author' => 'required',
            'class' => 'required',
            'status' => 'required',
            'price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'isbn_code.required' => 'ISBN番号は必ず入力してください',
            'isbn_code.max' => 'ISBN番号を正しく入力してください',
            'isbn_code.min' => 'ISBN番号を正しく入力してください',
            'title.required' => '教科書名は必ず入力してください',
            'author.required' => '著者名は必ず入力してください',
            'class.required' => '分類を選択してください',
            'status.required' => '状態を選択してください',
            'price.required' => '価格は必ず入力してください',
            'price.integer' => '価格は整数で入力してください'
        ];
    }
}
