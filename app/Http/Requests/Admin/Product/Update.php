<?php

namespace App\Http\Requests\Admin\Product;

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
            'category_id' => 'required|exists:product_categories,id',
            'subtitle' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'partner_description' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'images' => 'mimes:jpeg,jpg,png,gif,svg',
            'logo_1' => 'mimes:jpeg,jpg,png,gif,svg',
            'logo_2' => 'mimes:jpeg,jpg,png,gif,svg',
            'partner' => 'required|array',
            'partner.*' => 'required',
            'case' => 'filled|array',
            'case.*.description' => 'required_if:case.*.case_id,0',
            'case.*.client_id' => 'required_if:case.*.case_id,0',
            'benefit' => 'required|array',
            'benefit.*.title' => 'required',
            'benefit.*.description' => 'required',
            'benefit.*.icon' => 'mimes:jpeg,jpg,png,gif,svg',
        ];
    }
}
