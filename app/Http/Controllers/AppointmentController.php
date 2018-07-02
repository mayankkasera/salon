<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Appointment::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
       $Appointment = new Appointment();
        $Appointment->app_user_id = $request->app_user_id;
        $Appointment->date = $request->date;
        $Appointment->time_slot = $request->time_slot;
        $Appointment->service_ids = $request->service_ids;
        $Appointment->service_count = $request->service_count;
        $Appointment->status = $request->status;
        $Appointment->payment_type = $request->payment_type;
        $Appointment->paid_amount = $request->paid_amount;
        $Appointment->due_amount = $request->due_amount;
        $Appointment->total_price = $request->total_price;
        $Appointment->completed_time = $request->completed_time;
        $Appointment->coupon_flag = $request->coupon_flag;
        $Appointment->coupon_id = $request->coupon_id;
        $Appointment->save();
        return $Appointment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Appointment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $Appointment = Appointment::find($id);
         $Appointment->update($request->all());
         return $Appointment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
