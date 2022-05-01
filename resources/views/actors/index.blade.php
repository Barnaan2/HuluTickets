
@extends('actors.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2><i class="fluid-right">MANAGING ACTORS</i></h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/actor/create') }}" class="btn btn-success btn-sm" title="Add New Actor">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Actor
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First_Name</th>
                                        <th>Last_Name</th>
                                        <th>About</th>
                                        <th>Picture_Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($actors as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->First_Name }}</td>
                                        <td>{{ $item->Last_Name }}</td>
                                        <td>{{ $item->About }}</td>
                                        <td>{{ $item->Picture_Link }}</td>
                                        <td>
                                            <a href="{{ url('/actor/' . $item->id) }}" title="View Actor"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/actor/' . $item->id . '/edit') }}" title="Edit Actor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/actor' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Actor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection