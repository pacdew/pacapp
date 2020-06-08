@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h1>Choose to take a test, or create a test question</h1></div>
            <br>
            @if(!auth::guest())
                <div class="row">
                    <div class="card-body">
                        <a href="/questions/create" class="btn btn-primary float-right">Create Test Questions</a>
                        @if(count($questions) > 4) <!--Making it so that only if there is enough questions for a test than it will allow tests to be taken-->
                            <a href="/tests/create" class="btn btn-primary">Take Test</a>
                        @endif
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="card-body">
                        <a>Please Register or Login to access tests</a>
                        <a href="/" class="btn btn-primary float-right">Back To Home</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
