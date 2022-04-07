<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
        return [
            'title' => 'required|string|min:5|max:255'
			, 'name' => 'required|string|min:5|max:255'
        ];
    }
}
