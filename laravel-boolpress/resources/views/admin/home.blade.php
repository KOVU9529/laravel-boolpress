@extends('layouts.dashboard')
@section('content')
    <h1>Benvenuto nella sezione privata</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
       Quae, libero! Voluptas fugiat repellendus quisquam rem, totam excepturi magnam deleniti labore architecto, 
       blanditiis distinctio nostrum, porro illum amet. Nobis, dicta a.</p>
    <h2>Name: {{$user->name}}</h2>
    <h3>E-mail: {{$user->email}}</h3>
@endsection