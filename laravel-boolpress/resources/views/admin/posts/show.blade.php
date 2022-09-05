@extends('layouts.dashboard')
@section('content')
<h2>{{$post->title}}</h2>

<h3><strong>Creato il: {{$post->created_at}}</strong></h3>
<h3><strong>Aggiornato il: {{$post->updated_at}}</strong></h3>
<hr>
<p>{{$post->content}}</p>
@endsection
