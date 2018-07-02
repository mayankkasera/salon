<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopOff extends Model
{
    protected $fillable = ['date','start_time','end_time','description','date_flag','start_date','end_date'];
}
