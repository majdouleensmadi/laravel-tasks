@extends('movie.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Movies Page</div>
  <div class="card-body">

 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $movies->name }}</h5>
        <p class="card-text">Description: {{ $movies->description }}</p>
        <p class="card-text">Gener : {{ $movies->gener }}</p>
        <p class="card-text">image : {{ $movies->image }}</p>
  </div>

    </hr>

  </div>
</div>