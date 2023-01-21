<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            'name'=>'required|string|min:2',
            'surname'=>'required|string|min:2',
            'email'=>'required|string|email|unique:users',
            'pone'=>'required|string|unique:users',
            'age'=>'required|string',
            'img'=>'nullable|file',
            'sex'=>'required|string',
            'role'=>'required|integer',
        ];
    }
    public function messages(): array
    {
        return parent::messages();
    }
}
