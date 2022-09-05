@extends('layouts.dashboard')
@section('content')
<h2>Crea il tuo nuovo contenuto </h2>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('admin.posts.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Titolo post</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
      </div>
      <div class="form-group">
        <label for="content">Contenuto del post</label>
        <textarea class="form-control" id="content" name="content" rows="10" >{{old('content')}}</textarea>
      </div>
      <input type="submit" value="Salva post">
  </form>
    
@endsection