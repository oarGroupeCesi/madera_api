<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModuleStoreRequest extends Request
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
            'name'            => 'required|string',
            'height'          => 'integer',
            'width'           => 'required|integer',
            'quantity'        => 'required|integer',
            'modulenature_id' => 'required|integer',
            'project_id'      => 'required|integer',
        ];

    }
     public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
