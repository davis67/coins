<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'staffId' => "nullable|unique:users",
            'name' => "sometimes|required",
            'gender' => "sometimes|required|in:female,male",
            'email' => "sometimes|required|unique:users",
            'mobilePhone' => "sometimes|required|unique:users",
            'password' => 'required',
            // 'mobilePhone' => "sometimes|required|digits:10|regex:/07\d{8}/|unique:users",
            // 'alternativePhone' => "nullable|digits:10|regex:/07\d{8}/|unique:users",
            'alternativePhone' => "nullable|unique:users",
            'team_id' => "nullable",
            'title_id' => "nullable",
            'reportsTo' => "nullable",
            'userStatus' => 'nullable'
        ];
    }
}
