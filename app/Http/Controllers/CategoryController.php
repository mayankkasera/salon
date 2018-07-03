<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GetServiceByCategoryIdRequest;

class CategoryController extends Controller
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
                          'data'=> Category::all()
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
    public function store(CategoryRequest $request)
    {
            $category = new Category();
            $category->name = $request->name;
            $category->profile_img = $request->profile_img;
            $category->save();
            return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(
                         [
                          'error'=> false,
                          'data'=> Category::find($id)
                         ]
                         ,201);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Category = Category::find($id);
         $Category->update($request->all());
        

         return response(
                         [
                          'error'=> false,
                          'data'=> $Category
                         ]
                         ,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function getServiceByCategoryId(GetServiceByCategoryIdRequest $GetServiceByCategoryIdRequest)
    {
        return Category::find($GetServiceByCategoryIdRequest->id)->getService;
    }

    public function upload(Request $request)
    {
             $name = trim($request->name);
             $path = $request->image->storeAs('public/'.$request->path,$name.'.jpg');
             return response(
                         [
                          'error'=> false,
                          'path'=> $path
                         ]
                         ,201);
    }
}
                    



