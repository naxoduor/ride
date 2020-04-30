@extends('layout.app')
@section('content')
    <div class="col-sm-8">
    <div class="align-items-center align-content-center"><h1>{{$title}}</h1></div>
    <ul class="list-group">
        {!! Form::open(['method'=>'POST', 'id'=>'myForm']) !!}
        @foreach($results as $result)
        <div class="list-group-item" onclick="myForm.action='searchitem/{{$result->id}}';myForm.submit();">
          <div class="d-flex justify-content-between align-items-center border-bottom">
          <span>{{$result->request_date}}</span>
          <span>{{$result->cost}} {{$result->cost_unit}}</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
          <span>{{$result->pickup_location}}</span>
          <span>{{date("H:i:s",strtotime($result->request_date))}}</span>
          </div>
          <div class="d-flex justify-content-between align-items-center border-bottom">
            <span>{{$result->dropoff_location}}</span>
            <span>{{date("H:i:s",strtotime($result->dropoff_date))}}</span>
          </div>
          <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-column">
                        <img src="{{$result->car_pic}}">
                        <div class="p-2">{{$result->car_make}}</div>
                </div>
                <div class="d-flex flex-column">
                        <div class="p-2">Distance</div>
                        <div class="p-2">Duration</div>
                        <div class="p-2">sub total</div>
                </div>
                <div class="d-flex flex-column">
                        <div class="p-2">{{$result->distance}} {{$result->distance_unit}}</div>
                        <div class="p-2">{{$result->duration}} {{$result->duration_unit}}</div>
                        <div class="p-2">{{$result->cost}} {{$result->cost_unit}}</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                        <div class="p-2">{{$result->driver_name}}</div>
                        <img src="{{$result->driver_pic}}">
                        <div class="p-2">rating: {{$result->driver_rating}}</div>
                </div>
         </div>              
        </div>
        @endforeach
        {!! Form::close() !!}
      </ul>
    </div>
@endsection