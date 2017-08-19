@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4" style="height:570px;overflow:auto">
                            <label for="exampleSelect1">Restaurant List:</label>
                            <ul class="list-group">
                              @unless(empty($restaurant))  
                                  @foreach($restaurant as $key=>$details)  
                                    <li class="list-group-item">{{$details->name}} <span class="badge" id="distance_badge{{$key}}" style="display:none;"></span> <span class="badge" id="badge{{$key}}" lati="{{$details->lat}}" long="{{$details->lng}}">Show map</span></li>
                                  @endforeach
                              @endunless
                            </ul>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleSelect1">Mode of Travel:</label>
                                <select class="form-control" id="mode">
                                    <option value="DRIVING">Driving</option>
                                    <option value="WALKING">Walking</option>
                                    <option value="BICYCLING">Bicycling</option>
                                    <option value="TRANSIT">Transit</option>
                                </select>
                            </div>
                            <div id="maps" style="min-height:500px;">

                            </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4" style="height:570px;overflow:auto">
                        </div> 
                    </div>
                </div>
            </div>  
        </div>    
    </div>
</div>
<script src="/js/map_api.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbqzNyfMZRFb2Diyo7q4xi--6OPk8Mn9M"></script>

@endsection
