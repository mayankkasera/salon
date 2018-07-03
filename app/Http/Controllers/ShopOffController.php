<?php

namespace App\Http\Controllers;

use App\ShopOff;
use App\Http\Requests\ShopOffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckDateRequest;
use App\Http\Requests\CheckTimeRequest;

class ShopOffController extends Controller
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
                          'data'=> ShopOff::all()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopOffRequest $request)
    {
        $ShopOff = new ShopOff();
        $ShopOff->date = $request->date;
        $ShopOff->start_time = $request->start_time;
        $ShopOff->end_time = $request->end_time;
        $ShopOff->description = $request->description;
        $ShopOff->date_flag = $request->date_flag;
        $ShopOff->start_date = $request->start_date;
        $ShopOff->end_date = $request->end_date;
        $ShopOff->save();
        
        return response(
                         [
                          'error'=> false,
                          'data'=> $ShopOff
                         ]
                         ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopOff  $shopOff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        return response(
                         [
                          'error'=> false,
                          'data'=> ShopOff::find($id)
                         ]
                         ,201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopOff  $shopOff
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopOff $shopOff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopOff  $shopOff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ShopOff = ShopOff::find($id);
        $ShopOff->update($request->all());
       

        return response(
                         [
                          'error'=> false,
                          'data'=> $ShopOff
                         ]
                         ,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopOff  $shopOff
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopOff $shopOff)
    {
        //
    }


    public function CheckDate(CheckDateRequest $request)
    {
        //$current_time = Carbon::now()->toDateTimeString();
         
        $date = $request->date;
   
        $row = DB::table('shop_offs')->where('date_flag','=',1)->where(
          'start_date','<=',date('Y-m-d', strtotime($date)))->where(
            'end_date','>=',date('Y-m-d', strtotime($date)))->get();
        
        if($row->count()>0)
         return response(
                         [
                          'message'=>'Shop Closed'
                         ]
                         ,201);
        else
            return response(
                         [
                          'message'=>'Shop not Closed'
                         ]
                         ,201);

    }


    public function checkTime(CheckTimeRequest $request)
    {
        
//$current_time = Carbon::now()->toDateTimeString();
         
        $time = $request->time;
        date('Y-m-d H:i:s', strtotime($time));
   
        $row = DB::table('shop_offs')->where(
          'start_time','<=',date('Y-m-d H:i:s', strtotime($time)))->where(
            'end_time','>=',date('Y-m-d H:i:s', strtotime($time)))->get();

          
        
        if($row->count()>0)
         return response(
                         [
                          'message'=>'Shop Closed'
                         ]
                         ,201);
        else
            return response(
                         [
                          'message'=>'Shop not Closed'
                         ]
                         ,201);
    }
}
