<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CabinetRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:cabinets'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название кабинета',
            'name.unique' => 'Такой кабинет уже есть',
        ];
    }
}
