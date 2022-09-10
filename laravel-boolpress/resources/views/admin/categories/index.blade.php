@extends('layouts.dashboard')
@section('content')
<h2>Lista Categorie</h2>
<button class="btn btn-light">
  <a class="nav-link active color-light" href="{{ route('admin.categories.create') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
    Crea la tua nuova Categoria
</a>
</button>
<div class="row row-cols-3">
  @foreach ($categories as $category)
    <div class="col mt-2">
      <div class="card">
        <!--<img class="card-img-top" src="..." alt="Card image cap">-->
        <div class="card-body">
          <h5 class="card-title ">ID: {{$category->id}}</h5>
          <h5 class="card-title mt-3">Name: {{$category->name}}</h5>
          <h5 class="card-title mt-3">Slug: {{$category->slug}}</h5>
        <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
        </div>
      </div>
    </div>   
  @endforeach  
</div>
@endsection