@extends('dashboard.CinemaAdmin.layouts.Base')
@section('Content')
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h6 class="text-dark mb-0">Active Shows</h6>
                </div>
                <div class="row">

                    @foreach($movieShows as $movieShow)
                    <div class="col-md-3 col-lg-3  mb-1">
                        <div class="card shadow  ">
                            <div class="card-body">
                                <div class=" align-items-center ">

                                    <div class="col ">
                                        <div class="poster-image">
                                            <a href="{{route('selectedStatus',$movieShow->getMovie->id)}}">
                                                <img src =/{{$movieShow->getMovie->Poster_Link}} alt="poster">
                                            </a>
                                        </div>
                                        <div class="text-dark   ">
                                            <p>{{$movieShow->getMovie->Title}}</p>
                                        </div>
                                        <div class="text-dark  ">
                                            <p>Total{{$Cinema->Number_Of_Seats}} and sold {{$movieShow->Sold_Ticket}}</p>
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
                                    <tr>
                                        <td>Kalesh Alew</td>
                                        <td>2020</td>
                                        <td>200</td>
                                        <td>20</td>
                                        <td>10</td>
                                        <td>30</td>
                                        <td>$2000</td>
                                    </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
@endsection























