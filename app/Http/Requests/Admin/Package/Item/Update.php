<?php

namespace App\Http\Requests\Admin\Package\Item;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name' => 'required',
            'package_id' => 'required|exists:packages,id',
            'package_type_id' => 'required|exists:package_types,id',
            'montly_price' => 'integer|nullable',
            'hourly_price' => 'integer|nullable',
            'excerpt_id' => 'nullable',
            'excerpt_en' => 'nullable',
            'component' => 'required|array',
            'component.*.calculator_component_id' => 'required|exists:calculator_components,id',
            'component.*.value' => 'required|integer',
        ];
    }
}
