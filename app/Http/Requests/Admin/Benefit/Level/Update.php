<?php

namespace App\Http\Requests\Admin\Benefit\Level;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
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
            'name' => 'required|min:3|max:50|unique:benefit_levels,name,'.$this->id, 
			'code' => 'nullable|min:3|max:50||unique:benefit_levels,code,'.$this->id, 
			'is_active' => 'nullable', 
        ];
    }
}