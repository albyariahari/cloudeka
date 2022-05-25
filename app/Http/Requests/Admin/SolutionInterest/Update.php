<?php

namespace App\Http\Requests\Admin\SolutionInterest;

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
            'name' => 'required|min:3|max:50|unique:solution_interests,name,'.$this->id, 
			'code' => 'required|min:3|max:50|regex:/^[0-9A-Za-z\-\_]+$/|unique:solution_interests,code,'.$this->id, 
			'is_active' => 'nullable', 
        ];
    }
}
