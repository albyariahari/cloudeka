<?php

namespace App\Http\Requests\Admin\UseCases;

use App\Models\UseCase;
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
		$config['client'] = 'required|exists:clients,id';
        $config['description'] = 'required|string|min:5';

        return $config;
    }
}