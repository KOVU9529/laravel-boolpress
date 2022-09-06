@extends('layouts.dashboard')
@section('content')
<a class="btn btn-primary" href="{{route('admin.posts.edit',['post'=>$post->id])}}">Modifica post</a>
<h2>{{$post->title}}</h2>

<h3><strong>Creato il: {{$post->created_at->format('l j F Y')}}</strong></h3>
<h3><strong>Aggiornato il: {{$post->updated_at ->format('l j m y')}}</strong></h3>
<hr>
<p>{{$post->content}}</p>
@endsection
