<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.auth'], function () {
     Route::post('admin/login','AdminLoginController@adminLogin');
});


Route::post('/upload', 'CategoryController@upload' );

Route::apiResource('/category','CategoryController');

Route::apiResource('/appuser','AppUserController');

Route::apiResource('/service','ServiceController');

Route::apiResource('/package','PackageController');

Route::apiResource('/subscription','SubscriptionController');

Route::apiResource('/coupon','CouponController');

Route::apiResource('/shopoff','ShopOffController');

Route::apiResource('/slot','SlotController');

Route::apiResource('/appointment','AppointmentController');

Route::apiResource('/subcriptionappointment','SubscriptionAppointmentController');

Route::post('getservicebycategoryid','CategoryController@getServiceByCategoryId');

Route::get('/{id}/userappointments','AppUserController@userAppointment');

Route::get('/{id}/usersubscripions','AppUserController@userSubscripions');

Route::get('/{id}/usersubscriptionappointment','AppUserController@usersubscriptionappointment');

Route::post('checkdate','ShopOffController@checkDate');

Route::post('checktime','ShopOffController@checkTime');

Route::post('checkslot','SlotController@checkSlot');


Route::post('user/register', 'APIRegisterController@register');

Route::post('user/login', 'APILoginController@login');





