<?php

namespace App\Http\Requests\Admin\FaqItem;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
		$rules['title'] = 'required|string|min:5|max:255|unique:faq_item_translations,title';
		$rules['slug'] = 'nullable|regex:/^([0-9A-Za-z]+\-?)+([0-9A-Za-z])+$/|min:5|max:255|unique:faq_item_translations,slug';
		$rules['description'] = 'required|string|min:10';
		
        return $rules;
    }
}
