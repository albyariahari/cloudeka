<?php

namespace App\Http\Requests\Admin\FaqCategory;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
        return [
            'title' => "required|string|min:1|max:255|unique:faq_categories,title,{$this->id}"
        ];
    }
}
