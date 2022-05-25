<?php

namespace App\Http\Requests\Admin\Page;

use App\Models\Section;
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
        $config = array();
        $section = Section::where('id', $this->id)->first()->toArray();

        foreach ($section as $key => $value) {
            if (($key == 'field_title') && $value) {

                $field = explode("field_", $key)[1];

                $config[$field] = 'required';
            } else if (($key == 'field_image_1' || $key == 'field_image_2') && $value) {

                $field = explode("field_", $key)[1];

                $config[$field] = 'mimes:jpeg,jpg,png,gif,svg';
            }
        }

        return $config;
    }
}
