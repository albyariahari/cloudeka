<?php

namespace App\Http\Requests\Admin\PartnershipType;

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
            'name' => 'required|min:3|max:50|unique:partnership_types,name,'.$this->id, 
			'code' => 'required|min:3|max:50|regex:/^[0-9A-Za-z\-\_]+$/|unique:partnership_types,code,'.$this->id, 
			'is_active' => 'nullable', 
        ];
    }
}
