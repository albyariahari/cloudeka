<?php

namespace App\Http\Requests\Admin\SliderItem;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
        $rules['image'] = 'nullable|mimes:jpeg,jpg,png|max:500';
        $rules['video'] = 'nullable|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,mkv|max:100040';
		$rules['title'] = 'sometimes|required|string|min:5|max:255';
		$rules['subtitle'] = 'sometimes|required|string|min:5|max:255';
		$rules['description'] = 'nullable|string';
		$rules['cta_label'] = 'nullable|string|min:5|max:255';
		$rules['cta'] = 'nullable|string|url';
		
		return $rules;
    }
}