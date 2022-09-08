@extends('layouts.dashboard')
@section('content')
<h2>Modifica il contenuto </h2>

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

<form action="{{ route('admin.posts.update', ['post'=>$post->id])}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Titolo post</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title',$post->title)}}">
      </div>
      <div class="form-group">
        <label for="category_id">Categoria</label>
        <select class="form-select" name="category_id" id="category_id">
          <option value="">Nessuna</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}" {{old('category_id',$post->category_id) == $category->id  ? 'selected' : ''}}>{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      @foreach ($tags as $tag)
      @if ($errors->any())
      <div class="form-check">
        <input class="form-check-input" 
        type="checkbox" 
        value="{{$tag->id}}" 
        id="tag-{{$tag->id}}" 
        name="tags[]"
        {{--Come prendo quelli che gia ci sono
          -Se la collection
          -contiene il tag
          -visualizzazione selezionata
          -altrimenti niente--}}
          {{in_array($tag->id, old('tags',[])) ? 'checked' : ''}}>
        >
        <label class="form-check-label" for="tag-{{$tag->id}}"> 
         {{$tag->name}}
        </label>
      </div>
        @else
      <div class="form-check">
         <input class="form-check-input" 
         type="checkbox" 
         value="{{$tag->id}}" 
         id="tag-{{$tag->id}}" 
         name="tags[]"
         {{--Come prendo quelli che gia ci sono
          -Se la collection
          -contiene il tag
          -visualizzazione selezionata
          -altrimenti niente--}}
          {{$post->tags->contains($tag) ? 'checked' :''}}>
          <label class="form-check-label" for="tag-{{$tag->id}}"> 
         {{$tag->name}}
        </label>
      </div>
        @endif
        @endforeach
      <div class="form-group mt-3">
        <label for="content">Contenuto del post</label>
        <textarea class="form-control" id="content" name="content" rows="10" >{{old('content',$post->content)}}</textarea>
      </div>
      <input type="submit" value="Modifica post">
  </form>
    
    
@endsection