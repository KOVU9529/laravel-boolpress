@extends('layouts.dashboard')
@section('content')
<h2>{{$post->title}}</h2>

<h3><strong>Creato il: {{$post->created_at->format('l j F Y')}}</strong></h3>
<h3><strong>Aggiornato il: {{$post->updated_at ->format('l j m y')}}</strong></h3>
<hr>
<p>{{$post->content}}</p>
<a class="btn btn-primary" href="{{route('admin.posts.edit',['post'=>$post->id])}}">Modifica post</a>
<div>
    <form action="{{route('admin.posts.destroy',['post' => $post ->id])}}" method="post">
       @csrf
       @method('DELETE')
       <input class="btn btn-danger mt-2" type="submit" value="Elimina" onClick="return confirm('Sei sicuro di voler cancellare?');">
    </form>
 </div>
@endsection
