@extends('layouts.app')

@section('content')
    <h3 class="page-title">Taking A Randomly Generated Test</h3>
    {!! Form::open(['method' => 'POST', 'action' => 'TestsController@store']) !!}

    <div class="panel panel-default">
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
        <div class="panel-body">
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.<br />{!! nl2br($question->question) !!}</strong>

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
        {!! Form::submit(trans('Submit Results'), ['class' => 'btn btn-danger']) !!}
    @else
        <a>There Are No Questions As Of Your Last Request!</a>
        <br>
        <a>Sorry :p</a>
    @endif
    </div>
    {!! Form::close() !!}
    <br>
    <br>
@stop