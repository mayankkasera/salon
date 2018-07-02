<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['app_user_id',
            'date',
            'time_slot',
            'service_ids',
            'service_count',
            'status',
            'payment_type',
            'paid_amount',
            'due_amount',
            'total_price',
            'completed_time'];
}
