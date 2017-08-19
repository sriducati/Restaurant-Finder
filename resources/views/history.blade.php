@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome <span style="float:right;color:red;">@if(count($errors))@foreach($errors->all() as $error){{$error}}@endforeach @elseif(session('message')){{session('message')}}@endif</span></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4" style="height:570px;overflow:auto">
                            <label for="exampleSelect1">Registered On:</label>
                            <ul class="list-group">

                              @unless(empty($history[(Auth::user()->email)."_registered"]))
                                  @foreach(unserialize($history[(Auth::user()->email)."_registered"]) as $key=>$value)  
                                    <li class="list-group-item">{{$value}}</li>
                                  @endforeach
                              @endunless
                            </ul>
                        </div>
                        <div class="col-md-4" style="height:570px;overflow:auto">
                            <label for="exampleSelect1">LoggedIn History:</label>
                            <ul class="list-group">

                              @unless(empty($history[(Auth::user()->email)."_loggedin"]))
                                  @foreach(unserialize($history[(Auth::user()->email)."_loggedin"]) as $key=>$value)  
                                    <li class="list-group-item">{{$value}}</li>
                                  @endforeach
                              @endunless
                            </ul>
                        </div>
                        <div class="col-md-4" style="height:570px;overflow:auto">
                            <label for="exampleSelect1">LoggedOut History:</label>
                            <ul class="list-group">

                              @unless(empty($history[(Auth::user()->email)."_loggedout"]))
                                  @foreach(unserialize($history[(Auth::user()->email)."_loggedout"]) as $key=>$value)  
                                    <li class="list-group-item">{{$value}}</li>
                                  @endforeach
                              @endunless
                            </ul>
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
