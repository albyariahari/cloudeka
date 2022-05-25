<?php

namespace App\Http\Requests\Admin\Solution;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'language' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'excerpt' => 'required',
            'images' => 'mimes:jpeg,jpg,png,gif,svg',
            'case' => 'filled|array',
            'case.*.description' => 'required_if:case.*.case_id,0',
            'case.*.client_id' => 'required_if:case.*.case_id,0',
            'product' => 'required|array',
            'product.*' => 'required|exists:products,id',
			'bottom_title' => 'nullable|string|max:255', 
			'bottom_description' => 'nullable|string', 
			'bottom_link' => 'nullable|max:50', 
			'bottom_url' => 'nullable|url', 
			'bottom_image' => 'nullable|mimes:jpeg,jpg,png|max:500', 
        ];
    }
}
