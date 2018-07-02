<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionAppointmentRequest extends FormRequest
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
            'subscription_id' => 'required|exists:subscriptions,id',
            'service_ids' => 'required',
            'time' => 'required',
            'date' => 'required',
            'slot' => 'required',
            'status' => 'required',
            'completed_time' => 'required',
            'coupon_flag'=>'required',
            'coupon_id'=> 'exists:coupons,id'
        ];
    }
}
