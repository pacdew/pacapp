@extends('layouts.app')

@section('content')
    <h3 class="page-title">Create A Question !!!</h3>
    {!! Form::open(['method' => 'POST', 'action' => 'QuestionsController@store']) !!}

    <div class="panel panel-default">

        <br>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question', 'Question text', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question', old('question'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question'))
                        <p class="help-block">
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option1', 'Option #1', ['class' => 'control-label']) !!}
                    {!! Form::text('option1', old('option1'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option1'))
                        <p class="help-block">
                            {{ $errors->first('option1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option2', 'Option #2', ['class' => 'control-label']) !!}
                    {!! Form::text('option2', old('option2'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option2'))
                        <p class="help-block">
                            {{ $errors->first('option2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option3', 'Option #3', ['class' => 'control-label']) !!}
                    {!! Form::text('option3', old('option3'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option3'))
                        <p class="help-block">
                            {{ $errors->first('option3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option4', 'Option #4', ['class' => 'control-label']) !!}
                    {!! Form::text('option4', old('option4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option4'))
                        <p class="help-block">
                            {{ $errors->first('option4') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option5', 'Option #5', ['class' => 'control-label']) !!}
                    {!! Form::text('option5', old('option5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option5'))
                        <p class="help-block">
                            {{ $errors->first('option5') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
                    {!! Form::select('correct', $correct, old('correct'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('Submit'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop

