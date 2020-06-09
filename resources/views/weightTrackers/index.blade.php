@extends('layouts.app')
@section('content')
<body class="text-center">
  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header>
        <h1 class="cover-heading">Weight Tracker</h1>
    </header>
    <br>
    <main role="main" class="inner cover">
        <p class="lead">
            The weight Tracker line graph is within your dashboard.
            <br>
            Please look for it there.
        </p>
        <p class="lead"></p>
        @if(!auth::guest())
            <p>Because you are logged in you are able to input your weight for the day.</p>
            <a href="/weightTrackers/create" class="btn btn-primary">Here</a>
            @foreach ($weightTrackers as $weightTracker)
              <!--
                <br>
                <td>Weight: {{$weightTracker->weight}}
                <br>
                Logged on: {{ date('F d, Y', strtotime($weightTracker->created_at)) }}
                <br>
                by {{$weightTracker->user->name}}</td>
              -->
            @endforeach
        @else
            <p>Without logging in you are unable to log your weight for the day!</p>
            <p>Please log in or register.</p>
        @endif
    </main>
    <footer class="mastfoot mt-auto">
      <div class="inner">
      </div>
    </footer>
  </div>
</body>
@endsection
