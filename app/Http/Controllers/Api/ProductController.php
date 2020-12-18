<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Product::all();
       return response()->json([
           "data" => $data,
           "msg" => "Listing product successfully"
       ], 200);
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
    public function store(Request $request)
    {
       $data = new Product;
       $data->title = $request->title;
       $data->description = $request->description;
       $data->price = $request->price;
       $data->discount = $request->discount;
       $data->status = $request->status;
       if($data->save()){
           return response()->json([
               "data" => $data,
               "msg" => "Create Product Successfully"
           ], 201);
       }else{
        return response()->json([
            "data" => null,
            "msg" => "Create Product failure"
        ], 400);
       }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        if($data->save()){
            return response()->json([
                "data" => $data,
                "msg" => " Product Successfully"
            ], 200);
        }else{
         return response()->json([
             "data" => null,
             "msg" => "Not Found Product"
         ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->status = $request->status;
        if($data->save()){
            return response()->json([
                "data" => $data,
                "msg" => "Update Product Successfully"
            ], 200);
        }else{
         return response()->json([
             "data" => null,
             "msg" => "Update Product failure"
         ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $data = Product::find($id);
        if($data){
            $data->delete();
            return response()->json([
                "data" => null,
                "msg" => "Delete is successfully!"
            ], 200);
        }else{
            return response()->json([
                "data" => null,
                "msg" => "Looking Something Wrong!"
            ], 400);
        }
    }
}
