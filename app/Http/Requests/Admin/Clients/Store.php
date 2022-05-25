<?php

namespace App\Http\Requests\Admin\Clients;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
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
        $config['name'] = 'required|string|min:3|max:45|unique:clients,name';
		$config['logo'] = 'required|mimes:jpeg,jpg,png,gif,svg|max:650';

        return $config;
    }
}