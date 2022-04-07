<?php

namespace App\Http\Requests\Admin\Promotion;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
        $config['product_id'] = 'required|exists:products,id';
		$config['start_date'] = 'required|date_format:d/m/Y|after_or_equal:today';
		$config['end_date'] = 'nullable|date_format:d/m/Y|after:start_date';
        $config['is_popup'] = 'nullable|in:1';
        $config['title'] = 'required|string|min:5|max:255';
        $config['excerpt'] = 'required|string|min:5|max:255';
        $config['description'] = 'required|string|min:10';
        $config['url'] = 'required|url';
        $config['image'] = 'nullable|mimes:jpeg,jpg,png|max:500';

        return $config;
    }
}