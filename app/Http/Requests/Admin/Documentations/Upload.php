<?php

namespace App\Http\Requests\Admin\Documentations;

use App\Models\Documentation;
use Illuminate\Foundation\Http\FormRequest;

class Upload extends FormRequest {
    public function authorize() {
        return true;
    }
	
    public function rules() {
        return [
            // 'upload' => 'file|max:750|mimes:jpeg,jpg,png'
            'editormd-image-file' => 'file|max:750|mimes:jpeg,jpg,png'
        ];
    }
}