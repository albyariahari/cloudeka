<?php

namespace App\Http\Requests\API\Calculator;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class Get extends FormRequest
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
        $rules = [
            'page' => 'required|min:1',
            'per_page' => 'required|min:1',
            's' => 'nullable',
            'tags' => 'filled',
            'sort' => 'filled|in:desc,asc',
            'sort_by' => 'filled|in:id',
        ];

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['status' => 'error', 'message' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
