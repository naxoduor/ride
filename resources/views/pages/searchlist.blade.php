@extends('layout.app')
@section('content')
    <div class="col-sm-6">
    <h1>{{$title}}</h1>
    <ul class="list-group">
        {!! Form::open(['method'=>'POST', 'id'=>'myForm']) !!}
        @foreach($results as $result)
        <li class="list-group-item" onclick="myForm.action='searchitem/{{$result->id}}';myForm.submit();">
          <div class="d-flex justify-content-between align-items-center">
          <span>{{$result->request_date}}</span>
          <span>{{$result->cost}} {{$result->cost_unit}}</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
          <span>{{$result->pickup_location}}</span>
          <span>rating: {{$result->driver_rating}}</span>
          </div>
          <div class="d-flex justify-content-between align-items-left">
          <span>{{$result->dropoff_location}}</span>
          </div>
          <div class="pull-right">
              <span class="pull-right">{{$result->status}}</span>
          </div>
        </li>
        @endforeach
        {!! Form::close() !!}
      </ul>
    </div>
@endsection