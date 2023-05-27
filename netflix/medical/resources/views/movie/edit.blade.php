@extends('movie.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('movie/' . $movies->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $movies->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{ $movies->name}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{ $movies->description}}" class="form-control"></br>
        <label>Gener</label></br>
        <input type="text" name="gener" id="gener" value="{{ $movies->gener}}" class="form-control"></br>
        <label>Image</label><br>
        <input type="file" name="image" id="image" class="form-control"><br>
        <input type="submit" value="Update" class="btn btn-success"></br>
  
      </form>

  </div>
</div>
 
@stop