<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Http\Requests\AppUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AppUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AppUser::all();
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
    public function store(AppUserRequest $Request)
    {
        $AppUsers = new AppUser();
        $AppUsers->mobile_no = $Request->mobile_no;
        $AppUsers->place = $Request->place;
        $AppUsers->profile_img =  $Request->profile_img;  
        $AppUsers->save();
        return $AppUsers;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AppUser::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AppUser $appUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $AppUser = AppUser::find($id);
         $AppUser->update($request->all());
         return $AppUser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppUser $appUser)
    {
        //
    }
    
    public function userAppointment($id)
    {
        $row = DB::table('appointments')->where('app_user_id','=',$id)->get();
        return $row;
    }

    public function userSubscripions($id)
    {
        $row = DB::table('subscriptions')->where('user_id','=',$id)->get();
        return $row;
    }

    public function userSubscriptionAppointment($id)
    {
        $ids= DB::table('subscriptions')->select('id')->where('user_id','=',$id)->get();
        
        $row = array();
      
        foreach ($ids as $variable) {
             $temp = DB::table('subscription_appointments')->where('subscription_id','=',$variable->id)->get();

             if($temp->count()>0){
                $row[] = $temp;
             }
        }
        
        return $row;
    }


}
