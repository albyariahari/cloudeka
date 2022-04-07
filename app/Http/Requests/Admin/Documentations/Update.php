<?php

namespace App\Http\Requests\Admin\Documentations;

use App\Models\Documentation;
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
		$config['product'] = 'required|integer|exists:product_categories,id';
		$config['title'] = 'required|string|min:3|max:255';
        $config['description'] = 'required|string|min:5';
        $config['meta_title'] = 'nullable|string|min:3';
        $config['meta_keywords'] = 'nullable|string|min:5';
        $config['meta_description'] = 'nullable|string|min:5';
        $config['sub'] = 'nullable|array';
		$config['sub.*.title'] = 'required|string|min:3|max:255';
        $config['sub.*.description'] = 'required|string|min:5';
		$config['sub.*.sub.*.title'] = 'required|string|min:3|max:255';
        $config['sub.*.sub.*.description'] = 'required|string|min:5';

        return $config;
    }
}
