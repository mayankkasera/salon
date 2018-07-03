<?php

namespace App\Http\Controllers;

use App\Slot;
use Illuminate\Http\Request;
use App\Http\Requests\SlotRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckSlotRequest;

class SlotController extends Controller
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
                          'data'=> Slot::all()
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
    public function store(SlotRequest $request)
    {
        $Slot = new slot();
         $Slot->date = $request->date;
         $Slot->slot_no = $request->slot_no;
         $Slot->count = $request->count;
         $Slot->save(); 
         

         return response(
                         [
                          'error'=> false,
                          'data'=> $Slot
                         ]
                         ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return response(
                         [
                          'error'=> false,
                          'data'=> Slot::find($id)
                         ]
                         ,201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slot = Slot::find($id);
        $slot->update($request->all());
      
        return response(
                         [
                          'error'=> false,
                          'data'=> $slot
                         ]
                         ,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        //
    }


    public function checkSlot(CheckSlotRequest $request)
     {
 
          $slot = DB::table('slots')
                            ->where('date' ,'=' ,$request->date)
                            ->where('slot_no','=',$request->slot_no)->get();

           if(count($slot)<1)
               return response(
                         [
                          'message'=>'Slot Available!',
                         ]
                         ,201);  


          $count = DB::table('slots')->select('count')
                            ->where('date' ,'=' ,$request->date)
                            ->where('slot_no','=',$request->slot_no)
                            ->first()->count; 

          $NoOfSits =  DB::table('admins')->select('no_of_seats')
                            ->where('id' ,'=' ,$request->id)
                            ->first()->no_of_seats;

          


           if($NoOfSits>$count)
               return response(
                         [
                          'message'=>'Slot Available',
                         ]
                         ,201);   
           
           else 
               return response(
                         [
                          'message'=>'Slot Not Available'
                         ]
                         ,201); 
           

                                            
     }

}
