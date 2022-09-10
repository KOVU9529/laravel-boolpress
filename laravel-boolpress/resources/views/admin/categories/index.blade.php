@extends('layouts.dashboard')
@section('content')
<h2>Lista Categorie</h2>
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