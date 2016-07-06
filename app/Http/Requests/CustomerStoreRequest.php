<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerStoreRequest extends Request
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
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email|unique:customers',
            'adr_street' => 'required',
            'adr_zipcode' => 'required',
            'adr_city' => 'required',
        ];
    }

    public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
