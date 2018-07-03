<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response(
                         [
                          'error'=> false,
                          'data'=> Coupon::all()
                         ]
                         ,201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $Coupon = new Coupon();
        $Coupon->offer_name = $request->offer_name;
        $Coupon->coupon = $request->coupon;
        $Coupon->discount = $request->discount;
        $Coupon->discount_type = $request->discount_type;
        $Coupon->img = $request->img;
        $Coupon->expire_date = $request->expire_date;
        $Coupon->issue_date = $request->issue_date;
        $Coupon->save();
        
        return response(
                         [
                          'error'=> false,
                          'data'=> $Coupon
                         ]
                         ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return response(
                         [
                          'error'=> false,
                          'data'=> Coupon::find($id)
                         ]
                         ,201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $Coupon = Coupon::find($id);
         $Coupon->update($request->all());
         
         return response(
                         [
                          'error'=> false,
                          'data'=> $Coupon
                         ]
                         ,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        
    }
}
