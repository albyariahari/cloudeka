<?php

namespace App\Http\Requests\API\Feedback;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

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
            'documentation_id' => 'required|numeric|exists:documentations,id'
            , 'rate' => 'required|numeric|min:1|max:5'
            , 'problems' => 'required'
            , 'notes' => 'max:1000'
            , 'name' => 'required'
            , 'company' => 'required'
            , 'phone' => 'required|string|regex:/^\+?([(][0-9]{1,4}[)])?([\-\.\s]?[0-9]{1,4})*([\-\.\s]?[0-9]{1,4})?$/'
            , 'email' => 'required|email'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['status' => 'error', 'message' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
