@extends('dashboard.CinemaAdmin.layouts.Base')
@section('Content')
<div>


                    <div class="container-fluid">

                        @if(session('alert'))
                            <div class="alert alert-success">
                                {{session('alert')}}
                            </div>
                        @endif
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="card shadow  ">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class=" col-lg-5 ">
                                                <div class="d-flex justify-content-center align-items-center  mb-3" style="height:132px; ">
                                                    <h2 class=" text-center " style="color:black; font-size: 35px" >{{$MovieShow->getMovie->Title}}</h2>
                                                </div>
                                                <div class=" align-items-center 0">
                                                    <div class="col ">
                                                        <div class="poster-image" style="width: fit-content">
                                                            <a href="/Selectedstatus.html">
                                                                <img src="/{{$MovieShow->getMovie->Poster_Link}}" width="100%" style="border-radius: 3px; " alt="poster">
                                                            </a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-7 ">
                                                <h4 class="text-center mb-3">Reserve seats you sold</h4>
                                                <p class="text-center">{{session('msg')}}</p>
                                                <div class="seat-info">
                                                    <div>  <p>Sold by Hulu</p> <div class="Sold-by-hulu seat"> </div> </div>
                                                    <div>  <p>Sold by Cinema</p> <div class="sold-by-cinema seat"> </div> </div>
                                                    <div>  <p>Free</p> <div class="Free seat"> </div> </div>
                                                    <div>  <p>Selected</p> <div class="Selectedseat seat"> </div> </div>

                                                </div>

                                                <form  class=" pb-3"action="{{route('addSeat',$id)}}" method = "post" >
                                                    @csrf

                                                    <br>
                                                    <div class="seat-check">
                                                        @foreach($allSeats as $seat)
                                                            @if(in_array($seat,$arrayOfSeats))

                                                                {{-- here  the ticket it is sold by hulu tickets--}}

                                                                {{--  it will excute the following code if the seat is not reserved--}}
                                                                {{--            <p>the seat is not has been served </p>--}}

                                                                <input type="checkbox" id="r{{$seat}}" name="ChoosedSeats[]"  value="{{$seat}}"/>
                                                                <label class="checkbox-alias" for="r{{$seat}}">{{$seat}}</label>

                                                            @else
                                                                @if(in_array($seat,$huluSeats))
                                                                    {{--       sold by  hulu--}}


                                                                    <input type="checkbox"  id="r{{$seat}}" name="ChoosedSeats[]"  value="{{$seat}}">
                                                                    <label class="checkbox-alias1" for="r{{$seat}}">{{$seat}}</label>


                                                                @else
                                                                    {{--             here it means the ticket is sold by the cinema itself--}}
                                                                    {{--             you need to add new color right here--}}
                                                                    {{--            <p>sold by this cinema</p>--}}

                                                                    <input type="checkbox"  id="r{{$seat}}" name="ChoosedSeats[]"  value="{{$seat}}"></input>
                                                                    <label class="checkbox-alias2" for="r{{$seat}}">{{$seat}}</label>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <input type="submit"value="Reserve" class="btn btn-outline-primary">

                                                </form>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>






                        </div>

                        <div class="row mt-3 ">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header ">
                                        <p class="text-primary m-0 font-weight-bold">Tickets</p>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <table class="table dataTable my-0" id="dataTable">
                                                <thead>
                                                <tr>

                                                    <th>No</th>
                                                    <th>Coupon Number</th>
                                                    <th>Seat</th>
                                                    <th>Status </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-success">Check</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-success">Check</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-success">Check</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-success">Check</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-success">Check</button>
                                                    </td>

                                                </tr>


                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 ">
                                <div class="card ">
                                    <div class="card-header ">
                                        <p class="text-primary m-0 font-weight-bold">Tickets</p>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table " id="dataTable" role="grid" aria-describedby="dataTable_info">
                                            <table class="table dataTable my-0" id="dataTable">
                                                <thead>
                                                <tr>

                                                    <th>No</th>
                                                    <th>Coupon Number</th>
                                                    <th>Seat</th>
                                                    <th>Status </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-danger">Checked</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-danger">Checked</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-danger">Checked</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-danger">Checked</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>AL11515532</td>
                                                    <td>25</td>

                                                    <td>
                                                        <button class="btn btn-sm btn-danger">Checked</button>
                                                    </td>

                                                </tr>


                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    @endsection
