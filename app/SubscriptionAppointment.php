<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionAppointment extends Model
{
    protected $fillable = [
       'subscription_id','service_ids','time','date','slot','status','completed_time' 
    ];
}
