<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'app_user_id'=>'required|exists:app_users,id',
            'date'=>'required',
            'time_slot'=>'required',
            'service_ids'=>'required',
            'service_count'=>'required|numeric',
            'status'=>'required',
            'payment_type'=>'required',
            'paid_amount'=>'required|numeric',
            'due_amount'=>'required|numeric',
            'total_price'=>'required|numeric',
            'completed_time'=>'required',
            'coupon_flag'=>'required',
            'coupon_id'=> 'exists:coupons,id'
        ];
    }
}
