@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome <span style="float:right;color:red;">@if(count($errors))@foreach($errors->all() as $error){{$error}}@endforeach @elseif(session('message')){{session('message')}}@endif</span></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6" style="height:570px;overflow:auto">
                            <label for="exampleSelect1">Restaurant List:</label>
                            <ul class="list-group">
                              @unless(empty($restaurantName))
                                  @foreach($restaurantName as $key=>$value)  
                                    <li class="list-group-item">{{$value}} <span class="badge"><a href="edit/{{$key}}">Update</a></span><span class="badge"><a href="delete/{{$key}}">Delete</a></span></li>
                                  @endforeach
                              @endunless
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" action="/create">
                                <h2 class="form-signin-heading">Add Restaurant</h2>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Name:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Retaurant name">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="category">Category</label>
                                    <div class="col-sm-10">   
                                        <select class="form-control" name="cat" name="category">
                                            <option value="0">Vegetarian</option>
                                            <option value="1">Non Vegetarian</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Location:</label>
                                  <div class="col-sm-10">          
                                    <input id="address" class="form-control" type="textbox" value="bedok">
                                    <button id="submit" class="form-control btn-primary" type="button" value="Geocode">Get Latitude Longitude</button>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Latitude:</label>
                                  <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Longitude:</label>
                                  <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter longitude">
                                  </div>
                                </div>
                                <div class="form-group">        
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default btn-primary">Add</button>
                                  </div>
                                </div>
                            </form>

                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/map_lat_lng.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-4cx_cLSDa8gJy8qp9Vri46u1YgkS5HA&callback=initMap">
    </script>
@endsection
