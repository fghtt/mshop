<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'point' => 'required|string',
            'products' => 'required|string',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'Заполните название',
            'title.max' => 'Маскимальная длина названия 156 символов',
            'title.string' => 'Название должно быть строкой',
            'price.required' => 'Заполните цену',
            'title.integer' => 'Название должно числом',
            'discount.required' => 'Заполните скидку',
            'discount.max' => 'Скидка не должна превышать 99',
            'discount.integer' => 'Скидка должна быть числом',
            'description.required' => 'Заполните описание',
            'preview.required' => 'Загрузите картинку',
            'category_id.required' => 'Добавьте категорию'
        ]; // TODO: Change the autogenerated stub
    }
}
