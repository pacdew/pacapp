@extends('layouts.app')

@section('content')
    <h3 class="page-title">Results of Test #{{$test->id}}</h3>

    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <br>
                        <th>Test Taker </th>
                        <td>{{ $test->user->name }}</td>
                    </tr>
                    <tr>
                        <br>
                        <th>Date Taken: </th>
                        <td>{{ $test->created_at }}</td>
                    </tr>
                    <tr>
                        <br>
                        <th>Result: </th>
                        <td>{{ $test->result }}/5</td>
                    </tr>
                </table>
                <?php $i = 1?>
                @foreach($results as $result)
                    <table class="table table-bordered table-striped">
                        <th style="width: 50%">Question #{{ $i }}</th>
                            @if ($result->correct == 0)
                                <td>Incorrect!</td>
                            @else
                                <td>Correct!</td>
                            @endif
                        </tr>
                    </table>
                <?php $i++ ?>
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <br>
@stop