@extends('layouts.dashboard')
@section('content')
<h2>Crea la tua categoria </h2>
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

<form action="{{ route('admin.categories.store')}}" method="post">
    @csrf
    <div class="form-group">
       <label for="categories">Categoria</label>
       <input for="categories" type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    </div>
    <input class="btn btn-success" type="submit" value="Crea una categoria">
</form>
@endsection