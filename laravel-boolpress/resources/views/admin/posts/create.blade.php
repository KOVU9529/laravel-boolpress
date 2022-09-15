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
<!--enctype="multipart/form-data" per poter inviare i file-->
<form action="{{ route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Titolo post</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
      </div>
      <div class="form-group">
        <label for="category_id">Categoria</label>
        <select class="form-select" name="category_id" id="category_id">
          <option value="">Nessuna</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <h3>Tags:</h3>
        @foreach ($tags as $tag)
        <div class="form-check">
        <input class="form-check-input" 
        type="checkbox" 
        value="{{$tag->id}}" 
        id="tag-{{$tag->id}}" 
        name="tags[]"
        {{--Esperienza utente: 
          -Si utilizza la funzione in_array 
          -L'utilizzo è dovuto alla presenza di $tag->id
          -Presenza analizzata nell'array old('tags',[])
          -In funzione della presenza: le seguenti scelte
          PS.ATTENTO ALLE PARENTESI--}}
        {{in_array($tag->id, old('tags',[])) ? 'checked' : ''}}>
        <label class="form-check-label" for="tag-{{$tag->id}}"> 
         {{$tag->name}}
        </label>
        </div>
        @endforeach
      <div class="form-group mt-3">
        <label for="content">Contenuto del post</label>
        <textarea class="form-control" id="content" name="content" rows="10" >{{old('content')}}</textarea>
      </div>
      <div class="form-group mt-3">
        <label for="image" class="form-label">Immagine</label>
        <input  class="form-control" type="file" id="image" name="image">
      </div>
      <input type="submit" value="Crea post">
  </form>
    
@endsection