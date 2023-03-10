<?php

namespace App\Http\Requests\Admin\ProductsCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|max:156',
            'alias' => 'required|string|max:156',
            'discount' => 'required|integer|max:100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните название',
            'title.max' => 'Маскимальная длина названия 156 символов',
            'title.string' => 'Название должно быть строкой',
            'alias.required' => 'Заполните алиас',
            'alias.max' => 'Маскимальная длина алиаса 156 символов',
            'alias.string' => 'Алиас должно быть строкой',
            'discount.required' => 'Заполните скидку',
            'discount.max' => 'Скидка не должна превышать 99',
            'discount.integer' => 'Скидка должна быть числом',
        ]; // TODO: Change the autogenerated stub
    }
}
