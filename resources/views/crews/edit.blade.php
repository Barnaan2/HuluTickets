@extends('crews.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('crew/' .$crews->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$crews->id}}" id="id" />
        <label>First_Name</label></br>
        <input type="text" name="First_Name" id="First_Name" value="{{$crews->First_Name}}" class="form-control"></br>
        <label>Last_Name</label></br>
        <input type="text" name="Last_Name" id="Last_Name" value="{{$crews->Last_Name}}" class="form-control"></br>
        <label>About</label></br>
        <input type="text" name="About" id="About" value="{{$crews->About}}" class="form-control"></br>
        <label>Role</label></br>
        <input type="text" name="About" id="About" value="{{$crews->Role}}" class="form-control"></br>
        <label>Picture_Link</label></br>
        <img src="{{ asset('storage/Crew_Pictures/'.$crews->Picture_Link) }}" class="img-fluid img-thumbnail" width="150">
        {{-- <input type="text" name="Picture_Link" id="Picture_Link" value="{{$crews->Picture_Link}}" class="form-control"></br> --}}
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop