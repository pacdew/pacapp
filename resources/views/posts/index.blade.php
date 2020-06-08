@extends('layouts.app')

@section('content')
    @if(!auth::guest())
        <a href="/posts/create" class="btn btn-primary float-right">Create Post</a>
    @endif
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card" style="width: 10in">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                             <p>Written on {{$post->created_at}} by {{$post->user->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found.</p>
    @endif
@endsection