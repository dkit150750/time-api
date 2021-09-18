<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
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
            'first' => ['required', 'string'],
            'second' => ['required', 'string'],
            'third' => ['required', 'string'],
            'fourth' => ['required', 'string'],
            'fifth' => ['required', 'string'],
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first.required' => 'Введите время первого урока',
            'second.required' => 'Введите время второго урока',
            'third.required' => 'Введите время третьего урока',
            'fourth.required' => 'Введите время четвертого урока',
            'fifth.required' => 'Введите время пятого урока',
        ];
    }
}
