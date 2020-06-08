@extends('layouts.app')

@section('content')
    <h1>Input Weight for the day</h1>
    <p>Please only enter one per day.</p>
    {!! Form::open(['action' => 'WeightTrackersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group" style="width: 400px">
            {{Form::label('weight', 'Weight')}}
            {{Form::number('weight', '', ['class' => 'form-control', 'placeholder' => 'Weight'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <a href="/dashboard/" class="btn btn-danger">Return</a>
    {!! Form::close() !!}
@endsection