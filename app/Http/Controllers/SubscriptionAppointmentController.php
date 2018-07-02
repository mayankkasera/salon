<?php

namespace App\Http\Controllers;

use App\SubscriptionAppointment;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionAppointmentRequest;

class SubscriptionAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubscriptionAppointment::all();
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
    public function store(SubscriptionAppointmentRequest $request)
    {
        $Subcription_appointment = new SubscriptionAppointment();
        $Subcription_appointment->subscription_id = $request->subscription_id;
        $Subcription_appointment->service_ids = $request->service_ids;
        $Subcription_appointment->time = $request->time;
        $Subcription_appointment->date = $request->date;
        $Subcription_appointment->slot = $request->slot;
        $Subcription_appointment->status = $request->status;
        $Subcription_appointment->completed_time = $request->completed_time;
        $Subcription_appointment->coupon_flag = $request->coupon_flag;
        $Subcription_appointment->coupon_id = $request->coupon_id;
        $Subcription_appointment->save();
        return $Subcription_appointment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubscriptionAppointment  $subscriptionAppointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SubscriptionAppointment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubscriptionAppointment  $subscriptionAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionAppointment $subscriptionAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubscriptionAppointment  $subscriptionAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $SubscriptionAppointment = SubscriptionAppointment::find($id);
        $SubscriptionAppointment->update($request->all());
        return $SubscriptionAppointment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubscriptionAppointment  $subscriptionAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionAppointment $subscriptionAppointment)
    {
        //
    }
}
