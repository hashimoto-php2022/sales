<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'status' => 'required',
            'price' => 'required|regex:/^[0-9]+$/i'
        ];
    }

    public function messages()
    {
        return [
            'status.required' => '状態を選択してください',
            'price.required' => '希望売値は必ず入力してください',
            'price.regex' => '希望売値は0以上の整数で入力してください'
        ];
    }
}
