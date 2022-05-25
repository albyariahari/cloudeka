<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'title' => 'required',
            'news_category_id' => 'required|exists:news_categories,id',
            'type' => 'required|in:news,event',
            'start_date' => 'required_if:type,event',
            'end_date' => 'required_if:type,event',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'summary' => 'nullable',
            'outer_thumbnail' => 'mimes:jpeg,jpg,png,gif,svg',
            'inner_thumbnail' => 'mimes:jpeg,jpg,png,gif,svg',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ];
    }
}
