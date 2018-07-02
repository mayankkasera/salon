<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','profile_img'];

    public function getService()
    {
    	return $this->hasMany(Service::class);
    }
}
