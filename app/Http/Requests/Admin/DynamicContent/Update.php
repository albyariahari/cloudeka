<?php

namespace App\Http\Requests\Admin\DynamicContent;

use App\Models\ContentSetting;
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
        $content_setting = ContentSetting::where('id', $this->route('content_id'))->first()->toArray();

        foreach ($content_setting as $key => $value) {
            if (($key == 'field_title' || $key == 'field_subtitle' || $key == 'field_description' || $key == 'field_excerpt') && $value) {

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
