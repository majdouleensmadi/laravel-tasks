@extends('movie.layout')
@section('content')

<div class="card">
  <div class="card-header">Add New Movie</div>
  <div class="card-body">
    <form action="{{ url('movie') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label>Name</label><br>
      <input type="text" name="name" id="name" class="form-control"><br>
      <label>Description</label><br>
      <input type="text" name="description" id="description" class="form-control"><br>
      <label>Gener</label><br>
      <input type="text" name="genre" id="gnere" class="form-control"><br>
      <label>Director</label><br>
                <select name="director_id" id="director_id" class="form-control">
                    <option value="">Select Director</option>
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                    @endforeach
                </select><br>
      <label>Image</label><br>
      <input type="file" name="image" id="image" class="form-control"><br>
      <input type="submit" value="Save" class="btn btn-success"><br>
    </form>
  </div>
</div>
@stop
