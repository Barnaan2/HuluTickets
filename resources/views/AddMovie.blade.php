@extends('layouts.app')

@section('content')
Add movie
<form action="/" enctype="multipart/form-data" method="post">
    @csrf
    <input type="text" placeholder="Title of the movie" name="Title"><br>

    the poster of your movie <input type="file" name="Poster"><br>

    Description <textarea name="Description" id="" cols="30" rows="10"></textarea>
    Release Date<input type="date" name="Release_Date">
    Tailer Link  <input type="text" name="Tailer_Link">
    select actors
    <select name="Actor_id[]" multiple>
        @foreach($actors as $actor)
            <option value="{{$actor->id}}">{{$actor->First_Name}}</option>
        @endforeach
    </select><br>
    select crew members
    <select name="Crew_id[]" multiple>
        @foreach($crews as $crew)
            <option value="{{$crew->id}}">{{$crew->First_Name}}---{{$crew->Role}}</option>
        @endforeach
    </select><br>
    <button type="submit">Add movie</button>

</form>

Add Actor
    <form action="/AddActor" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Actors First_Name" name="First_Name"><br>
        <input type="text" placeholder="Actors Last_Name" name="Last_Name"><br>
        picture of An Actor<input type="file" name="Actor_Picture"><br>

      About<textarea name="About" id="" cols="30" rows="10"></textarea>

        <button type="submit">Add Actor</button>

    </form>

Add Crew
<form action="{{route('addCrew')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder=" First_Name" name="First_Name"><br>
    <input type="text" placeholder=" Last_Name" name="Last_Name"><br>
    picture of An Actor<input type="file" name="Crew_Picture"><br>

    About<textarea name="About" id="" cols="30" rows="10"></textarea>
    <input type="text" placeholder="Role" name="Role"><br>
    <button type="submit">Add crew Members</button>

</form>
<form action="{{route('addMovieshow')}}" method = "post">
    @csrf
    <label for="cars">Choose movie:</label>
    <select name="Movie_id" multiple>
        @foreach($movies as $movie)
        <option value="{{$movie->id}}">{{$movie->Title}}</option>
        @endforeach
    </select><br>
    <label >Choose Cinema:</label>
    <select name="Cinema_id" >
        @foreach($cinemas as $cinema)
            <option value="{{$cinema->id}}">{{$cinema->Name}}</option>
        @endforeach
    </select><br>
  time <input type="time" name="Show_time"><br>
 date <input type="date" name ="Show_date"><br>
    Pirce of single Ticket <input type="number" name="Price"><br>
    how many ticket sold<input type="number" name="Sold_Ticket"><br>
    <input type="submit" value="Set Online">
</form>

    @endsection
