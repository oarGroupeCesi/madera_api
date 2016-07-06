<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectStoreRequest extends Request
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
            'name' => 'required',
            'status' => 'required|in:draft,accepted,pending,refused,command,billing',
            'quotation_price' => 'integer',
            'quotation_date' => 'date',
            'customer_id' => 'required|integer',
        ];
    }
     public function response(array $errors)
    {
        return response()->json($errors, 400);
    }
}
