@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
@foreach($actors as $actor)
<img src="../{{$actor->Picture_Link}}" alt="" />
 {{$actor->First_Name}} - <a href="{{route('EditActor',$actor->id)}}">Edit Actor</a>

@endforeach
@endsection
