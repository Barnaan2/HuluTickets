@extends('dashboard.CinemaAdmin.layouts.Base')
@section('Content')
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h6 class="text-dark mb-0">Active Shows</h6>
                </div>
                @if(session('alert'))
                    <div class="alert alert-success">
                        {{session('alert')}}
                    </div>
                @endif
                <div class="row">

                    @foreach($movieShows as $movieShow)
                    <div class="col-md-3 col-lg-3  mt-2" >
                        <div class="card shadow  ">
                            <div class="card-body">
                                <div class=" align-items-center ">
{{--                                    {{route('selectedStatus',$movieShow->getMovie->id)}}--}}
                                    <div class="col ">
                                        <div class="poster-image " style="width:fit-content">
                                            <a href="{{route('selectedStatus',$movieShow->id)}}">
                                                <img src ="/{{$movieShow->getMovie->Poster_Link}}" style="width:100% "  alt="poster">
                                            </a>
                                        </div>
                                        <div class="text-dark   ">
                                            <p>{{$movieShow->getMovie->Title}}</p>
                                        </div>
                                         <div class="progres">

                                            <progress   value="{{$movieShow->Sold_Ticket}} "  max="{{$Cinema->Number_Of_Seats}}" />
{{--                                            <p>Total{{$Cinema->Number_Of_Seats}} and sold {{$movieShow->Sold_Ticket}}</p>--}}
                                         </div>
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="30"
                                            aria-valuemin="0" aria-valuemax="100" style="width:{{$movieShow->Sold_Ticket / $Cinema->Number_Of_Seats * 100}}%">


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row mt-3">
                    <div class="card shadow col-md-21">
                        <div class="card-header ">
                            <p class="text-primary m-0 font-weight-bold">Movie Shows</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Schedule</th>
                                        <th>Ticket Price</th>
                                        <th>Tickets sold by Hulu </th>
                                        <th>Tickets sold by the Cinema</th>
                                        <th>Sold tickets</th>
                                        <th>Revenue Generated</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($movieShows as $movieShow)
                                    <tr>
                                        <td>{{$movieShow->getMovie->Title}}</td>
                                        <td>{{$movieShow->getSchedule->Show_Date}}</td>
                                        <td>{{$movieShow->Price}}</td>
                                        <td>20</td>
                                        <td>10</td>
                                        <td>{{$movieShow->Sold_Ticket}}</td>
                                        <td>$2000</td>
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























