<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
       'package_id','user_id','user_service_count','time','payment_type' 
    ]; 
}
