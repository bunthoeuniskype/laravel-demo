<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AboutUsController extends Controller
{
   public function index(Request $request){


      $data = Post::where(["type" => "page", "category" => "about_us"])->first();
      return view("about_us", ["data" => $data]);
   }
}
