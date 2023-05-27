@extends('director.layout')
@section('content')

<div class="card">
  <div class="card-header">Add New Movie</div>
  <div class="card-body">
    <form action="{{ url('director') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label>Name</label><br>
      <input type="text" name="name" id="name" class="form-control"><br>
      <input type="submit" value="Save" class="btn btn-success"><br>

    </form>
  </div>
</div>
@stop
