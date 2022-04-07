<?php

namespace App\Http\Requests\Admin\Benefit\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => [
				'required', 
				'min:3', 
				'max:50', 
				Rule::unique('benefit_categories', 'name')->where('type_id', $this->type_id), 
			], 
            'code' => [
				'nullable', 
				'min:3', 
				'max:50', 
				Rule::unique('benefit_categories', 'code')->where('type_id', $this->type_id), 
			], 
			'is_active' => 'nullable', 
        ];
    }
}