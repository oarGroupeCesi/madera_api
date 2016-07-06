<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RangeStoreRequest extends Request
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
            'exterior_finish' => 'required|in:wood,roughcast',
            'insulating' => 'required|in:synthetic,natural,biological',
            'top' => 'required|in:roof tiles,slates,thatch',
            'configuration' => 'required|in:Without angle,With closing angle,With opening angle',
            'template' => 'required|boolean',
        ];
    }
      public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
