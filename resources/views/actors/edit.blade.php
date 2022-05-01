@extends('actors.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('actor/' .$actors->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$actors->id}}" id="id" />
        <label>First_Name</label></br>
        <input type="text" name="First_Name" id="First_Name" value="{{$actors->First_Name}}" class="form-control"></br>
        <label>Last_Name</label></br>
        <input type="text" name="Last_Name" id="Last_Name" value="{{$actors->Last_Name}}" class="form-control"></br>
        <label>About</label></br>
        <input type="text" name="About" id="About" value="{{$actors->About}}" class="form-control"></br>
        <label>Picture_Link</label></br>
        <input type="text" name="Picture_Link" id="Picture_Link" value="{{$actors->Picture_Link}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop