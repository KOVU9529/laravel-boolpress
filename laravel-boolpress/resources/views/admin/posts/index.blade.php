@extends('layouts.dashboard')
@section('content')
<h2>Lista post</h2>
<div class="row row-cols-3">
    
        @foreach ($posts as $post)
        <div class="col mt-2">
            <div class="card">
                <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                  <a href="{{route('admin.posts.show', ['post' => $post ->id])}}"class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
            
        @endforeach
    
</div>
    
@endsection
