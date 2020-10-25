<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $data = Product::orderBy("created_at", "desc")->get();
        return view("product.index", compact('data'));
    }

    public function create(Request $req)
    {
        return view("product.create");
    }

    public function store(Request $req)
    {
        $data = new Product;
        $data->title       = $req->title;
        $data->description = $req->description;
        $data->price       = $req->price;
        $data->discount    = $req->discount;
        $data->status      = $req->status?true:false;
        if($data->save())
            return redirect('product');
        return redirect()->back();
    }

    public function edit(Request $req, $id)
    {
       $data = Product::find($id);
       return view("product.edit", compact('data'));
    }

    public function update(Request $req, $id)
    {
        $data = Product::find($id);
        $data->title       = $req->title;
        $data->description = $req->description;
        $data->price       = $req->price;
        $data->discount    = $req->discount;
        $data->status      = $req->status?true:false;
        if($data->save())
            return redirect('product');
        return redirect()->back();
    }

    public function destroy($id)
    {
       Product::where("id", $id)->delete();
       return redirect()->back();
    }
}
