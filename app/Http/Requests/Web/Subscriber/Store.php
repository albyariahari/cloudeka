<?php

namespace App\Http\Requests\Web\Subscriber;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
        return [
            'email' => 'required|email'
        ];
    }
}
