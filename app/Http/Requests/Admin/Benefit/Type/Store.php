<?php

namespace App\Http\Requests\Admin\Benefit\Type;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|min:3|max:50|unique:benefit_types,name', 
			'code' => 'nullable|min:3|max:50|unique:benefit_types,code', 
			'is_active' => 'nullable', 
        ];
    }
}