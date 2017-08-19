<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\restaurant;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantName = DB::table("restaurants")->lists('name','id');
        return view('home')->with('restaurantName',$restaurantName);

    }

    public function history()
    {
        $redis = app()->make('redis');
        $history = $redis->hgetall(Auth::user()->email);
        //print_R(unserialize($history[(Auth::user()->email)."_loggedin"]));
        //exit;
        return view('history')->with('history',$history);

    }

    public function create(Request $request)
    {
        $input = \Request::all();
        $this->validate($request,['name'=>'required']);

        restaurant::create(['name'=>$input["name"],'category'=>$input["cat"],'lat'=>$input["latitude"],'lng'=>$input["longitude"]]);
        return \Redirect::to('home')->with('message','Restaurant Added Success');
    }

    public function edit($id)
    {
        $selectedRest = DB::table("restaurants")->where("id",$id)->get();
        //print_r($selectedRest);
        return view('update',compact('selectedRest'));
    }

    public function delete($id)
    {
        $selectedRest = DB::table("restaurants")->where("id",$id)->delete();
        //print_r($selectedRest);
        //return view('update',compact('selectedRest'));
        return \Redirect::to('home')->with('message','Restaurant Deleted Success');
    }

    public function update(Request $request,$id)
    {
        $input = \Request::all();
        $this->validate($request,['name'=>'required']);
        DB::table('restaurants')
            ->where('id', $id)
            ->update(['name'=>$input["name"],'category'=>$input["cat"],'lat'=>$input["latitude"],'lng'=>$input["longitude"]]);
        return \Redirect::to('home')->with('message','Restaurant Updated Success');;
    }
}
