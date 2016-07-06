<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModuleUpdateRequest extends Request
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
            'name'            => 'string',
            'height'          => 'integer',
            'width'           => 'integer',
            'quantity'        => 'integer',
            'modulenature_id' => 'integer',
            'project_id'      => 'integer',
        ];
    }

    public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
