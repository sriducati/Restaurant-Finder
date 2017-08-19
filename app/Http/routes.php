<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','RestaurantController@index');

/*Route::get('/',function(){
	$redis = app()->make('redis');
	$key = "srihost9@gmail.com_loggedin";
	$key1 = "srihost9@gmail.com_loggedout";
	$key2 = "sriducati@gmail.com_loggedin";
	$key3 = "sriducati@gmail.com_loggedout";

	$redis->sadd($key, 'china');
	$redis->sadd($key, 'india');	
	$redis->sadd($key1, 'english');
	$redis->sadd($key1, 'hindi');


	$redis->sadd($key2, '23232323');
	$redis->sadd($key2, 'sdsd');	
	$redis->sadd($key3, 'kannada');
	$redis->sadd($key3, 'somethin');

	$redis->hmset("srihost9@gmail.com", $key, serialize($redis->smembers($key))); 
	$redis->hmset("srihost9@gmail.com", $key1, serialize($redis->smembers($key1)));

	$redis->hmset("sriducati@gmail.com", $key2, serialize($redis->smembers($key2))); 
	$redis->hmset("sriducati@gmail.com", $key3, serialize($redis->smembers($key3)));

	//$key2 = 2;

	//$redis->hset($key, 'loggedin', , 44);
	//$redis->hset($key, 'loggedout', 33);
	//$redis->hmset($key, "eng");
    //$redis->rpush($key, "french");
    //$redis->hset($key, 'loggedin', $redis->lpush("loggin", "Redis"));
    //$redis->hset("2", 'loggedin', $redis->lpush("loggin", "Redis"));
   ; 
   	

   	$redis->lpush("registered", "Mysql"); 

	//$redis->hset($key2, 'age', date("l jS \of F Y h:i:s A"));
	//$redis->hset($key2, 'married', "no");
	$registeredList = $redis->lrange("registered", 0 ,-1); 
	$redis->hmset("srihost9@gmail.com", $registeredList);
	$AllregisteredList = $redis->hgetall("srihost9@gmail.com");


	$logginList = $redis->lrange("loggin", 0 ,-1); 
	$redis->hmset("srihost9@gmail.com", $logginList);
	$AlllogginList = $redis->hgetall("srihost9@gmail.com");

	$loggoutList = $redis->lrange("loggout", 0 ,-1); 
	$redis->hmset("srihost9@gmail.com", $loggoutList);
	$AllloggoutList = $redis->hgetall("srihost9@gmail.com");

  // print_r($arList); 
	//$redis->set("name","srini");
	return $AllloggoutList;

	return print_R($redis->hgetall("sriducati@gmail.com"));

});
*/
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/history', 'HomeController@history');
Route::post('/create','HomeController@create');
Route::get('/edit/{id}','HomeController@edit');
Route::patch('/update/{id}','HomeController@update');
Route::get('/delete/{id}','HomeController@delete');
