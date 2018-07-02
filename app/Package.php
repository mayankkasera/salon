<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
       'name','service_ids','service_count','price','img' 
    ];
}
