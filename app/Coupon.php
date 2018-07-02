<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable =['offer_name','coupon','discount','discount_type','img','expire_date','issue_date'];
}
