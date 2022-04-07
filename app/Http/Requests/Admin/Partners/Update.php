<?php

namespace App\Http\Requests\Admin\Partners;

use App\Models\Partner;
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
        $config['name'] = "required|string|min:1|max:45|unique:partners,name,{$this->id}";
		$config['logo'] = 'mimes:jpeg,jpg,png,gif,svg|max:650';

        return $config;
    }
}
