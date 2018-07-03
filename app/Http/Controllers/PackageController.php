<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
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
                          'data'=> Package::all()
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
    public function store(PackageRequest $request)
    {
        $Package = new Package();
        $Package->name = $request->name;
        $Package->service_ids = $request->service_ids;
        $Package->service_count = $request->service_count;
        $Package->price = $request->price;
        $Package->img = $request->img;
        $Package->save();
       
         return response(
                         [
                          'error'=> false,
                          'data'=> $Package
                         ]
                         ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       return response(
                         [
                          'error'=> false,
                          'data'=> Package::find($id)
                         ]
                         ,201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $package = Package::find($id);
        $package->update($request->all());
        
        return response(
                         [
                          'error'=> false,
                          'data'=> $package
                         ]
                         ,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
