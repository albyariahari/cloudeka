<?php

namespace App\Http\Requests\Admin\Slider\Item;

use App\Models\Slider;
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
        $config = array();
        $slider = Slider::find($this->route('slider'))->toArray();

        foreach ($slider as $key => $value) {
            if (($key == 'field_title') && $value) {

                $field = explode("field_", $key)[1];

                $config[$field] = 'required';
            }
        }
        $config['image'] = 'required|mimes:jpeg,jpg,png,gif,svg';
        $config['video'] = 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,mkv|max:100040';

        return $config;
    }
}
