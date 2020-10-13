<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormHomeRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'website' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'mail' => 'required|email:rfc,dns',
            'summary' => 'required|regex:/^[a-zA-Z\s]+$/u',
        ];
    }
}
