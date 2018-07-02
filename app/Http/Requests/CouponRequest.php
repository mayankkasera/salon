<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'offer_name' => 'required',
            'coupon' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'img' => 'required',
            'expire_date' => 'required',
            'issue_date' => 'required'
        ];
    }
}
