<?php

namespace App\Http\Requests\Admin\FaqItem;

use Illuminate\Foundation\Http\FormRequest;

// Model(s)
use App\Models\FaqItem;

class Update extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
		$id = FaqItem::find($this->item_id)->translate(request()->lang)->id;
		
		$rules['title'] = "required|string|min:5|max:255|unique:faq_item_translations,title,{$id}";
		$rules['slug'] = "nullable|regex:/^([0-9A-Za-z]+\-?)+([0-9A-Za-z])+$/|min:5|max:255|unique:faq_item_translations,slug,{$id}";
		$rules['description'] = 'required|string|min:10';
		
        return $rules;
    }
}
