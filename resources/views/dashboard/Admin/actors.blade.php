@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
@foreach($actors as $actor)
<img src="../{{$actor->Picture_Link}}" alt="" />

@if(\Illuminate\Support\Facades\Auth::user()->role==1)
    {{$actor->First_Name}} -   <a href="{{route('EditActors',$actor->id)}}">Edit Actor</a>
@else
    {{$actor->First_Name}} -   <a href="{{route('EditActor',$actor->id)}}">Edit Actor</a>
    @endif
@endforeach
@endsection
