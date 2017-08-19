<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\restaurant;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{

    public function index()
    {
        //$restaurant = DB::table("restaurant")->get();
        $restaurant = restaurant::all();
        return view('welcome',compact('restaurant'));
    }

}
