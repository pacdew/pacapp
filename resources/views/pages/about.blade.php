@extends('layouts.app')
@section('content')
<body class="text-center">
  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header>
    </header>
      <br>
      <br>
    <main role="main" class="inner cover">
      <h1 class="cover-heading"><?php echo $title; ?></h1>
      <p class="lead">This is my website for the term project. It's a basic laravel website that uses html and php. 
          Although it looks quite basic, as it was my first experience with both html or php and took around 3 full days
          to complete.
      </p>
      <p class="lead">
      </p>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>Take a test or make a post, whatever you feel like</a>.</p>
        <p>Why not take a look at what 
          <a class="jump" target="_blank" href="https://laravel.com/">laravel</a>
          has to offer!
        </p>
      </div>
    </footer>
  </div>
</body>
@endsection
