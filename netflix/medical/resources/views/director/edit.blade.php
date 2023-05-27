@extends('director.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('director/' . $director->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $director->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{ $director->name}}" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"><br>

      </form>

  </div>
</div>
 
@stop