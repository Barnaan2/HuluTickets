@extends('dashboard.Admin.layouts.admindashboard')
@section('Content')
<div>
 @foreach($interested_users as $interested)
{{$interested->name}} - {{$interested->email}} - {{$interested->phone}} -{{$interested->address}} -
{{$interested->cinema_name}} - {{$interested->cinema_address}} <br>
@endforeach
</div>
@endsection
