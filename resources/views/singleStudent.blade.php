@extends('layout.start_layout')

@section('title')
Student's detail
@endsection

@section('stylesheet')
<style>
.form-check-input[type=checkbox] {
  background-color:rgb(255, 140, 197);
  border-color:pink;
  height:18px;
  width:36px;
}
.form-check-input[type=checkbox]:checked {
  background-color:blue;
  border-color:blue;
}

.singleStudentImg{
    cursor:pointer;
    height:180px;
    width:180px;
    background:url('boy.avif');
    background-position:100%;
    background-size:100%;
    border-radius:3%;  
}
.form-control,.form-select{
    border:2px solid #64E2B7;
    box-shadow:5px 5px #64E2B7;
}

.active_navbar_link{
  background:#D81159;
  /*  background:#6d676e;*/ 
}
</style>
@endsection



@section('content')

@extends('layout.navbar')

<div class="container" style="max-width:800px">
    <div class="row">
            <div class="card p-0 mt-3" style="border:5px solid #64E2B7;">
                <div class="card-header" style="background:#64E2B7;">
                    <h2>Admission Form</h2>
                </div>
                <form action="{{route('saveData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="formFile" class="singleStudentImg"></label>
                                    <input class="form-control" name="Profile_image" id="formFileLg" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" name="Name" required class="form-control" id="floatingInput" placeholder="Student Name">
                                                <label for="floatingInput">Student Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" name="Email" required class="form-control" id="floatingInput" placeholder="Father Name">
                                                <label for="floatingInput">Email Address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" name="Contact" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Contact</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" name="Father_name" required class="form-control" id="floatingInput" placeholder="Adhaar number">
                                                <label for="floatingInput">Father Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="text" name="Address" required class="form-control" id="floatingInput" placeholder="Enter Address">
                                                <label for="floatingInput">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input type="radio" class="btn-check" checked required name="Gender"  id="success-outlined" value="Male" autocomplete="off" >
                                                <label class="btn btn-outline-primary" for="success-outlined">Male</label>

                                                <input type="radio" class="btn-check"  required name="Gender" id="danger-outlined" value="Female" autocomplete="off">
                                                <label class="btn btn-outline-pink " for="danger-outlined">Female</label>
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-1"></div>
                        </div>
                        {{-- second row --}}
                        <div class="row mt-2">
                            <div class="col-3">
                                 <div class="form-floating">
                                        <input type="text" name="Enrollment_id" required class="form-control text-center" readonly id="floatingInput" value="{{$enroll_id}}">
                                        <label for="floatingInput">Enrollment Id</label>
                                 </div>
                            </div>
                            <div class="col-9">
                                <div class="form-floating">
                                    <select class="form-select" required name="Shift_code" aria-label="Default select example">
                                        @foreach($shift_data as $shift_data_key=>$shift_data_value)
                                        <option value="{{$shift_data_value->Shift_code}}">
                                             {{$shift_data_value->Shift_code}} -
                                             {{$shift_data_value->Shift_name}} -
                                             {{$shift_data_value->Entering_time}} -
                                             {{$shift_data_value->Entering_zone}} -
                                             {{$shift_data_value->Leaving_time}} -
                                             {{$shift_data_value->Leaving_zone}} -
                                             {{$shift_data_value->Fees}}
                                        </option>
                                        @endforeach
                                    </select>
                                   <label for="floatingInput">Shift</label>
                                </div> 
                            </div>
                        </div>
                        <div class="row mt-2 ">                           
                            <div class="col-3">     
                               <div class="form-floating">
                                  <select class="form-select" required name="Assign_seat" aria-label="Default select example">
                                     @foreach($seat_array as $skey=>$svalue)
                                        <option value="{{$svalue['Seat_no']}}">{{$svalue['Seat_no']}}</option>          
                                     @endforeach 
                                     @if(empty($seat_array))
                                            <option class="text-danger bg-danger">Seats Are Fulled</option> 
                                     @endif
                                  </select>
                                  <label for="floatingInput">Assign Seat</label>
                                </div>
                            </div>
                            
                        

                            <div class="col-3">
                                <div class="form-floating">
                                    <input type="date" name="Date_of_joining" required class="form-control" id="floatingInput" placeholder="Monthly fees">
                                    <label for="floatingInput">Date Of Joining</label>
                                </div>
                            </div>
                            <div class="col-3">
                                 <div class="form-floating">
                                    <select class="form-select" required name="Staff" aria-label="Default select example">
                                        @foreach($staff_data as $staff_data_key=>$staff_data_value)
                                        <option value="{{$staff_data_value->Name}}">{{$staff_data_value->Name}}</option>
                                        @endforeach
                                    </select>
                                   <label for="floatingInput">Staff</label>
                                </div>
                            </div>
                             <div class="col-3">
                                 <div class="form-floating">
                                    <input type="submit" class="form-control">
                                    <label for="floatingInput">Save Record</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
 
                <div class="card-footer" style="background:#64E2B7;">
                    2025@New Student Details
                </div>
            </div>
    </div>
</div>
@endsection

