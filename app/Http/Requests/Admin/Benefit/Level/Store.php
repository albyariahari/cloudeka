<?php

namespace App\Http\Requests\Admin\Benefit\Level;

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
            'name' => 'required|min:3|max:50|unique:benefit_levels,name', 
			'code' => 'nullable|min:3|max:50|unique:benefit_levels,code', 
			'is_active' => 'nullable', 
        ];
    }
}