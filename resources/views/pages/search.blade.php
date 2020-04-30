@extends('layout.app')
@section('content')
    <div class="col-sm-6">
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => 'TripsController@searchform', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('text', 'Text')}}
        {{Form::text('text', '',['class'=>'form-control', 'placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
            {{Form::checkbox('cancelled', 'cancelled', false)}}
    </div>
    <div class="row">
    <div class="col-sm-6">
    <div class="form-group">
            {{Form::radio('distance', '0,1000', true)}}
            <label>Any</label>
    </div>
    <div class="form-group">
            {{Form::radio('distance', '0,3', true)}}
            <label>Under 3 km</label>
    </div>
    <div class="form-group">
            {{Form::radio('distance', '3,8', true)}}
            <label>3 to 8 km</label>
    </div>
    <div class="form-group">
            {{Form::radio('distance', '8,15', true)}}
            <label>8 to 15 km</label>
    </div>
    <div class="form-group">
            {{Form::radio('distance', '15,1000', true)}}
            <label>More than 15 km</label>
    </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
                {{Form::radio('time', '0,1000', true)}}
                <label>Any</label>
        </div>
            <div class="form-group">
                    {{Form::radio('time', '0,5', true)}}
                    <label>Under 5 min</label>
            </div>
            <div class="form-group">
                    {{Form::radio('time', '5,10', true)}}
                    <label>5 to 10 min</label>
            </div>
            <div class="form-group">
                    {{Form::radio('time', '10,20', true)}}
                    <label>10 to 20 min</label>
            </div>
            <div class="form-group">
                    {{Form::radio('time', '20,10000', true)}}
                    <label>More than 20 min</label>
            </div>

    </div>
    </div>
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}

    
    {!! Form::close() !!}
    </div>
@endsection