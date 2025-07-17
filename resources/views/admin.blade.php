@extends('layout.start_layout')
@section('title')
Admin
@endsection

@section('content')
<nav class="navbar  navbar-expand-md bg-dark fixed-top border-bottom border-bodys">
    <div class="container-fluid text-light">
        <a href="{{route("welcome")}}" class="btn btn-sm btn-outline-info navbar-brand text-light">Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a href="{{route("admin")}}" class="btn active btn-sm btn-outline-warning navbar-brand text-light">Config</a>
            </li>
            <li class="nav-item">
            <a href="" class="btn btn-sm btn-outline-success navbar-brand text-light">Go To Library</a>
            </li>
            <li class="nav-item">
            <a href="{{route("singleStudent")}}" class="btn btn-sm btn-outline-danger navbar-brand text-light">Add New Student</a>
            </li>
            <li class="nav-item">
            <a href="{{route("logout")}}" class="btn btn-sm btn-outline-info navbar-brand text-light">Logout</a>
            </li>

            
        </ul>
        <span class="navbar-text text-light">
        Total Seats: {{$seats}}
      </span>
    </div>
    </div>
</nav>

<div class="container pt-3">
    {{-- navgation ends --}}
    <div class="row mt-5">
        <div class="card p-1 border-0">
            <div class="container">
                <div class="row">
                    <div class="col-3 p-3 bg-warning bg-opacity-25 border-0">
                    <form action="{{route('Addseat')}}" method="post">
                        @csrf
                      <div class="input-group mb-3">
                        <input type="number" name="Seat_no" class="form-control" placeholder="Enter Seats" aria-label="Add Seats" aria-describedby="button-addon2">
                        <input class="btn btn-warning" type="submit" id="button-addon2" value="Update">
                      </div>
                      </form>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-6 p-3 bg-danger bg-opacity-25 border-0">
                        <form action="{{route('Addstaff')}}" method="post">
                            @csrf
                        <div class="input-group">
                            <input type="text" name="Name" class="form-control" placeholder="Enter Staff Name" aria-label="Recipient’s username with two button addons">
                            <input type="text" name="Designation" class="form-control" placeholder="Enter Staff Designation" aria-label="Recipient’s username with two button addons">
                            <input class="btn btn-danger" type="submit" value="Add">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- row 1 ends --}}
    <div class="row mt-4">
        <div class="card p-3 bg-info bg-opacity-25 border-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form action="{{route('Addtiming')}}" method="post">
                            @csrf
                        <div class="input-group">
                            {{--shiftcode--}}
                           <select class="form-select input-group-text" name="Shift_code" aria-label="Default select example">
                                <option selected disabled>Days Shift Code</option>
                                <option value="1A">1A</option>
                                <option value="2A">2A</option>
                                <option value="3A">3A</option>
                                <option value="4A">4A</option>
                                <option value="5A">5A</option>
                                <option value="6A">6A</option>
                                <option value="7A">7A</option>
                                <option value="8A">8A</option>
                                <option value="9A">9A</option>
                                <option value="10A">10A</option>
                                <option value="11A">11A</option>
                                <option value="12A">12A</option>
                                <option disabled>Night Shift Code</option>
                                <option value="1P">1P</option>
                                <option value="2P">2P</option>
                                <option value="3P">3P</option>
                                <option value="4P">4P</option>
                                <option value="5P">5P</option>
                                <option value="6P">6P</option>
                                <option value="7P">7P</option>
                                <option value="8P">8P</option>
                                <option value="9P">9P</option>
                                <option value="10P">10P</option>
                                <option value="11P">11P</option>
                                <option value="12P">12P</option>
                            </select>

                            {{-- select shift --}}
                            <select class="form-select input-group-text" name="Shift_name" aria-label="Default select example">
                                <option selected>Shift</option>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                                <option value="Night">Night</option>
                            </select>
                            {{-- timing date--}}
                            <select class="form-select input-group-text" name="Entering_time" aria-label="Default select example">
                                <option selected>Entry Time</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select name="Entering_zone" class="form-select input-group-text" aria-label="Default select example">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            <select class="form-select input-group-text" name="Leaving_time" aria-label="Default select example">
                                <option selected>Exit Time</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                             <select name="Leaving_zone" class="form-select input-group-text" aria-label="Default select example">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            {{-- //fees text --}}
                            <input type="text" name="Fees" class="form-control" placeholder="Enter Fees" aria-label="Recipient’s username with two button addons">
                            <input class="btn btn-info" type="submit" value="Add">
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- row 2 ends --}}
    <div class="row mt-5">
        <div class="col-6 p-0">
            <table class="table table-striped postion-relative table-hover table-dark table-responsive">
                <thead >
                    <tr>
                        <th>S.no</th>
                        <th>Shift Code</th>
                        <th>Shift</th>
                        <th>Timing</th>
                        <th>Fees</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @php 
                $count=1;
                @endphp
                <tbody class="table-group-divider">
                  @foreach($shifts as $shift_key=>$shift_value)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$shift_value->Shift_code}}</td>
                        <td>{{$shift_value->Shift_name}}</td>
                        <td>{{$shift_value->Entering_time}}{{$shift_value->Entering_zone}} to {{$shift_value->Leaving_time}}{{$shift_value->Leaving_zone}}</td>
                        <td>{{$shift_value->Fees}}</td>
                        <td><a href="{{route('deleteshift',$shift_value->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr> 
                  @endforeach                             
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
        <div class="col-4 p-0">
            <table class="table table-striped postion-relative table-hover table-dark table-responsive">
                <thead >
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                @php 
                  $count=1;
                @endphp
                  @foreach($staffs as $staff_key=>$staff_value)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$staff_value->Name}}</td>
                        <td>{{$staff_value->Designation}}</td>
                        <td><a href="{{route('deletestaff',$staff_value->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr> 
                    @endforeach           
                </tbody>
            </table>
        </div>
    </div>
    

 {{-- row 3 ends --}}
   
</div>




{{-- @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position:absolute;top:120px;left:0;">
        {{session('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}


@endsection