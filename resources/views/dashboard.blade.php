@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="row">
                    <div class="col-6">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="/posts/create" class="btn btn-primary">Create Post</a>
                            @if(count($posts) > 0)    
                                <h3>Your Blog Posts</h3>
                                <table class="table table-striped">
                                    <tr>
                                        <td>Title</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</td>
                                            <td>
                                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                                    {{form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p>You Have No Posts... yet.</p>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="/tests" class="btn btn-primary">Take A Test</a>
                            @if(count($tests) > 0)    
                                <h3>Your Tests Taken</h3>
                                <table class="table table-striped">
                                    @foreach($tests as $test)
                                        <tr>
                                        <td><a href="/results/{{$test->id}}">Test Number {{$test->id}}</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p>You Haven't Taken any tests . . . yet.</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h1>Weight Tracker</h1>
                    <a href="/weightTrackers/create" class="btn btn-primary">Add Weight</a>
                    <div id="weight_chart" style="height: 600px" hidden ></div>
                    <script> var weightData = new Array(["Date", "Weight"]);</script>
                    @if(count($weightTrackers) > 0 )
                    <button id="chart_btn" onclick="drawChart()">click for chart</button>
                        <table class="table table-striped">
                            @foreach ($weightTrackers as $weightTracker)
                            <script>
                                var temp = ['{{ date('F d', strtotime($weightTracker->created_at)) }}', {{$weightTracker->weight}}];
                                if(weightData.length < 8){
                                    weightData.push(temp);
                                }
                                else if(weightData.length >= 8){
                                    weightData.shift();
                                    weightData.push(temp);
                                    weightData[0] = ["Date", "Weight"]
                                }
                                else{
                                    //do nothing or spurt out an error.
                                    console.log("ERROR CREATING GRAPH!")
                                }
                            </script>
                            @endforeach
                        </table>
                        <script>
                            //weightData.forEach(element => {
                            //    console.log(element);
                            //});
                            google.charts.load('current', {'packages':['corechart']});

                            function drawChart() {
                                weight_chart.hidden = false;
                                //adds the points to the graph by compiling different database entries into an array
                                var data = google.visualization.arrayToDataTable(weightData);

                                var options = { //options for the google grapher
                                    title: 'Weight Tracker',
                                    curveType: 'function',
                                    legend: { position: 'bottom' }
                                };

                                chart_btn.hidden = true;
                                var chart = new google.visualization.LineChart(document.getElementById('weight_chart'));

                                chart.draw(data, options);
                            }
                        </script>
                        
                    @else
                        <!lets them know that there was nothing in the database for them...>
                        <p>There is no data yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
