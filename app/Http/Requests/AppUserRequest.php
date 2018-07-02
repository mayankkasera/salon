<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppUserRequest extends FormRequest
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
            'mobile_no' => 'required|unique:app_users|numeric|regex:/[7-9][0-9]{9}/',
            'place' => 'required',
            'profile_img' => 'required',
            'panding_amount' => 'required|numeric'
        ];
    }
}
