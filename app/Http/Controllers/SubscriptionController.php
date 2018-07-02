<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Support\Facades\DB;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Subscription::all();
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
    public function store(SubscriptionRequest $request)
    {
        $Subscription = new subscription();
         $Subscription->package_id = $request->package_id;
         $Subscription->user_id = $request->user_id;
         $Subscription->user_service_count = $request->user_service_count;
         $Subscription->time = $request->time;
         $Subscription->payment_type = $request->payment_type;
         $Subscription->save();
         return $Subscription;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Subscription::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Subscription = Subscription::find($id);
        $Subscription->update($request->all());
        return $Subscription;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function userSubscripions($id)
    {
        $row = DB::table('subscriptions')->where('user_id','=',$id)->get();
        return $row;
    }
}
