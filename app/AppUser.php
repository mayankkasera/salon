<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AppointmentController;

class AppUser extends Model
{
    protected $fillable = ['mobile_no','place','profile_img','panding_amount'];

    public function fun()
    {
    	return $this->hasOne(AppointmentController::class);
    }
}
