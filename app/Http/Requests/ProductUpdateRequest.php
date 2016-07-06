<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'range_id' => 'integer',
            'project_id' => 'integer',
        ];
    }
     public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
