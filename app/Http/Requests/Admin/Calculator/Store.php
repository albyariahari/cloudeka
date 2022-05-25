<?php

namespace App\Http\Requests\Admin\Calculator;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'component' => 'required|array',
            'component.*.calculator_component_id' => 'required|exists:calculator_components,id',
        ];
    }
}
