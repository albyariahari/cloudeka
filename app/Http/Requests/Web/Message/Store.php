<?php

namespace App\Http\Requests\Web\Message;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
		return [
            'need' => 'required|numeric|exists:dynamic_contents,id'
            , 'hear' => 'required'
            , 'company' => 'required|string|min:3|max:255'
            , 'full-name' => 'required|string|min:3|max:255'
            , 'email' => 'required|email'
            , 'phone' => 'required|string|regex:/^\+?([(][0-9]{1,4}[)])?([\-\.\s]?[0-9]{1,4})*([\-\.\s]?[0-9]{1,4})?$/'
            , 'message' => 'required|string|min:10'
        ];
    }
}
