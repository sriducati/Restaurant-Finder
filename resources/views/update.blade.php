@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               
                <div class="panel-heading">Welcome <span style="float:right;color:red;">@if(count($errors))@foreach($errors->all() as $error){{$error}}@endforeach @endif</span></div>


                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form class="form-horizontal" method="post" action="/update/{{$selectedRest[0]->id}}">
                                {{ method_field('PATCH') }}
                                <h2 class="form-signin-heading">Update Restaurant</h2>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Name:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{$selectedRest[0]->name}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="category">Category</label>
                                    <div class="col-sm-10">   
                                        <select class="form-control" name="cat" name="category">

                                            <option @if($selectedRest[0]->category==0)selected @endif value="0">Vegetarian</option>
                                            <option @if($selectedRest[0]->category==1)selected @endif value="1">Non Vegetarian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Latitude:</label>
                                  <div class="col-sm-10">          
                                    <input type="text" class="form-control" name="latitude" value="{{$selectedRest[0]->lat}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Longitude:</label>
                                  <div class="col-sm-10">          
                                    <input type="text" class="form-control" name="longitude" value="{{$selectedRest[0]->lng}}">
                                  </div>
                                </div>
                                <div class="form-group">        
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Update</button>
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

@endsection
