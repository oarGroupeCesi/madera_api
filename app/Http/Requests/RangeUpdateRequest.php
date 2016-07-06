<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RangeUpdateRequest extends Request
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
             'exterior_finish' => 'in:wood,roughcast',
            'insulating' => 'in:synthetic,natural,biological',
            'top' => 'in:roof tiles,slates,thatch',
            'configuration' => 'in:Without angle,With closing angle,With opening angle',
            'template' => 'boolean',
        ];
    }
     public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
