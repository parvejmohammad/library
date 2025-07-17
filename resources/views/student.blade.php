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
.hey_hover{
    transition:.2s;
}
.hey_hover:hover{
    color: blue;
    transition:.2s;
    transform: scale(1.01);

}
.modal_view_color{
    background: #63C8FF;
}
.modal_update_color{
    background: #F6F49D;
}

.active_navbar_link{
  background:#D81159;
  /*  background:#6d676e;*/ 
}
</style>

@endsection

@extends('layout.navbar')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Students Fees</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
           <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button  style="background:#FF7676" class="border-0 p-2  rounded-start  {{$active_student=isset($active_1) ? $active_1 : "";}} " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><a href="{{route('student')}}" class="hey_hover text-decoration-none"> All Students</a></button>
                    <button style="background:#F6F49D;" class="border-0 p-2 hey_hover  {{$active_deposit=isset($active_2) ? $active_2 : "";}}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Deposit Fees</button>
                    <button style="background:#06D6A0" class="border-0 p-2 hey_hover rounded-end {{$active_receipt=isset($active_3) ? $active_3 : "";}} " id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Reciept</button>
                </div>
           </nav>
           <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade  {{$active_student=isset($active_1) ? $active_1 : "";}}  {{$show_student=isset($show_1) ? $show_1 : "";}}"  id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="card p-2 " style="background:#FF7676;">
                        @if(isset($student_info))
                        <table class="table table-striped postion-relative table-hover table-dark table-responsive">
                            <thead >
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Enrollment Id</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Contact</th>
                                    <th>Seat No.</th>
                                    <th>Fees</th>
                                    <th>Payed Till</th>
                                    <th>Days Left</th>
                                    <th>View</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    <th>Pay Fees</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @php
                                    $count=1;
                                    $date=new DateTime();
                                    $current_month_days=$date->format('t');
                                @endphp
                                @foreach($student_info as $info_k=>$info_v)
                                    <tr>
                                        <td>{{$count++;}}</td>
                                        <td>{{$info_v->Enrollment_id}}</td>
                                        <td>{{$info_v->Name}}</td>
                                        <td>{{$info_v->Father_name}}</td>
                                        <td>{{ $info_v->Contact}}</td>
                                        <td>{{$info_v->Assign_seat}}</td>
                                        <td>{{$info_v->Student_fees}}</td>
                                        <td>{{$info_v->Payed_till}}</td>
                                        <td class="text-info">-{{$current_month_days - date('d',strtotime($info_v->Date_of_joining))}}</td>
                                        <td><!-- Button trigger modal box view data -->
                                            <button class="btn btn-sm  viewdata" style="background:#63C8FF"  data-url="{{ route('view_Modal_Data', $info_v->id) }}" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                                        </td>
                                        <td><!-- Button trigger modal box view data -->
                                            <button class="btn btn-sm  updatedata" style="background:#E3DE61" data-url="{{ route('update_Modal_Data', $info_v->id) }}" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                                        </td>
                                        <td><a href="{{route('delete_student',$info_v->id)}}" class="btn btn-sm"  style="background:tomato">Delete</a></td>
                                        <td><!-- Button trigger modal box pay fees -->
                                            <button class="btn btn-sm btn-warning pay_Fees"  data-url="{{ route('payFees_Modal', $info_v->id) }}" data-bs-toggle="modal" data-bs-target="#payfeesModal">Pay</button>
                                        </td>
                                    </tr>
                               @endforeach
                               
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade {{$active_deposit=isset($active_2) ? $active_2 : "";}} {{$show_deposit=isset($show_2) ? $show_2 : "";}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="card" style="background:#F6F49D;">
                        <div class="row mt-2">
                            <div class="col-6 m-auto">
                                <form action="{{route('searchStudent')}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="search_student" required class="form-control form-control-lg" placeholder="Search Student" aria-label="Recipient’s username" aria-describedby="button-addon2">
                                        <input class="btn btn-lg btn-danger" type="submit" id="button-addon2" value="Find">
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(isset($students) && $students->isNotEmpty())
                        
                        <div class="row mt-3 p-3">
                          <div class="col">
                            <table class="table table-striped postion-relative table-hover table-dark table-responsive">
                                <thead >
                                    <tr>
                                        <th>Id</th>
                                         <th>Enrollment Id</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Your Monthly Fees</th>
                                        <th>Old Reciept</th>
                                        <th>Click To Pay</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    
                                    @foreach($students as $stu_id=>$stu_value)
                                    <tr>
                                        <td>{{$stu_value->id}}</td>
                                        <td>{{$stu_value->Enrollment_id}}</td>
                                        <td>{{$stu_value->Name}}</td>
                                        <td>{{$stu_value->Father_name}}</td>
                                        <td>{{$stu_value->Contact}}</td>
                                        <td>{{$stu_value->Address}}</td>
                                        <td>{{$stu_value->Student_fees}}</td>
                                        <td><a href="{{route('Old_reciept',$stu_value->id)}}" class="btn btn-primary">Old Reciepts</a></td>
                                         <td><!-- Button trigger modal box pay fees -->
                                            <button class="btn btn-sm btn-warning pay_Fees"  data-url="{{ route('payFees_Modal', $stu_value->id) }}" data-bs-toggle="modal" data-bs-target="#payfeesModal">Pay Fees</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                          </div>
                        </div>
                        @else
                          <b class="text-danger">No Student Record found.</b>
                       @endif
                    </div>
                </div>
                {{-- /search fees accordian ends --}}
                @if(isset($active_3) && isset($show_3))
                <div class="tab-pane fade  {{$active_receipt=isset($active_3) ? $active_3 : "";}} {{$show_receipt=isset($show_3) ? $show_3 : "";}}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                  <div class="card " >
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-2">
                                <div class="text-center">
                                   <img src="/Student_DP/{{$student_reciept->Profile_image}}" class="rounded img-fluid"  alt="Student Profile">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="h5 bg-secondary-subtle p-2 rounded">Name</p>
                                            <p class="h5 bg-success bg-opacity-50 p-2 rounded ">{{$student_reciept->Name}}</p>
                                        </div>
                                         <div class="col-4">
                                            <p class="h5 bg-secondary-subtle p-2 rounded">Father's Name</p>
                                            <p class="h5 bg-success bg-opacity-50 p-2 rounded ">{{$student_reciept->Father_name}}</p>
                                        </div>
                                         <div class="col-4">
                                            <p class="h5 bg-secondary-subtle p-2 rounded">Contact</p>
                                            <p class="h5 bg-success bg-opacity-50 p-2 rounded ">{{$student_reciept->Contact}}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                         <div class="col-4">
                                            <p class="h5 bg-secondary-subtle p-2 rounded">Gender</p>
                                            <p class="h5 bg-success bg-opacity-50 p-2 rounded ">{{$student_reciept->Gender}}</p>
                                        </div>
                                         <div class="col-4">
                                            <p class="h5 bg-secondary-subtle p-2 rounded">Amount</p>
                                            <p class="h5 bg-success bg-opacity-50 p-2 rounded ">{{$student_reciept->Student_fees}}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="h5 bg-secondary-subtle p-2 rounded">Fees Payed Till</p>
                                            <p class="h5 bg-success bg-opacity-50 p-2 rounded ">{{date('d/m/Y',strtotime($student_reciept->Payed_till))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- receipt table --}}
                        <div class="row mt-2">
                            <div class="col">
                                   <table class="table table-striped postion-relative table-hover table-dark table-responsive">
                                         <thead >
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Slip No.</th>
                                                <th>From Month</th>
                                                <th>To Month</th>
                                                <th>Staff</th>
                                                <th>Mode</th>
                                                <th>Status</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $count=1;
                                        @endphp
                                        <tbody class="table-group-divider">
                                            @foreach($fees_download as $fees_key=>$fees_value)
                                            <tr>
                                                <td>{{$count++;}}</td>
                                                <td>{{$fees_value->id}} </td>
                                                <td>{{$fees_value->From_month}} </td>
                                                <td>{{$fees_value->To_month}}</td>
                                                <td>{{$fees_value->Staff_name}}</td>
                                                <td>{{$fees_value->Payment_mode}}</td>
                                                @if($fees_value->Status==='success')
                                                     <td class="text-success">{{$fees_value->Status}}</td>
                                                @else
                                                     <td class="text-danger">{{$fees_value->Status}}</td>
                                                @endif
                                                <td><a href="{{route('donwloadPDF',$fees_value->id)}}" class="btn btn-sm btn-info">Download</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
          </div>
        </div>
        
    </div>
    
</div>

{{-- modal box view view data--}}
<div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title modal_view_color p-2 rounded-left fs-5 view_name" id="staticBackdropLabel">Parvej mohammad</h1>
        <h1 class="bg-secondary mt-2 bg-opacity-50 rounded-right p-2 fs-5 view_enrollment_id" id="staticBackdropLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="icon.jpg" class="rounded img-fluid view_image" alt="">
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Date Of Joining</p>
                    <p class="h5 p-2 modal_view_color rounded view_date_of_joining"></p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Contact</p>
                    <p class="h5 modal_view_color p-2 rounded view_contact"></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Email</p>
                    <p class="h5 modal_view_color p-2 rounded view_email"></p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Father Name</p>
                    <p class="h5 modal_view_color p-2 rounded view_father_name"></p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Gender</p>
                    <p class="h5 modal_view_color p-2 rounded view_gender"></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Address</p>
                    <p class="h5 modal_view_color p-2 rounded view_address"></p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Assign Seat</p>
                    <p class="h5 modal_view_color p-2 rounded view_seat"></p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Shift Code</p>
                    <p class="h5 modal_view_color p-2 rounded view_shift"></p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Staff</p>
                    <p class="h5 modal_view_color p-2 rounded view_staff"> </p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Payed Till</p>
                    <p class="h5 modal_view_color p-2 rounded view_payed_till"></p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Fees</p>
                    <p class="h5 modal_view_color p-2 rounded view_fees"></p>
                </div>
            </div>

        </div>
      </div>
      <div class="modal-footer text-start ">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- modal ends here --}}

{{-- modal box update data--}}
<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title modal_update_color-50 p-2 rounded-left fs-5 update_name_title" id="staticBackdropLabel">Parvej mohammad</h1>
        <h1 class="bg-secondary mt-2 bg-opacity-50 rounded-right p-2 fs-5 update_enrollment_id" id="staticBackdropLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('update_student_data')}}" method="POST" enctype="multipart/form-data" id="updateForm">
        @csrf
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="icon.jpg" class="rounded img-fluid update_image" alt="">
                    <input type="file" name="Profile_image" class="update_image_file" accept="image/*">
                    <input type="hidden" name="update_id" class="update_id"/>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Name</p>
                    <p class="h5 modal_update_color p-2 rounded">
                    <input type="text" required name="Name" class="form-control update_name"/>
                    </p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Contact</p>
                    <p class="h5 modal_update_color p-2 rounded ">
                         <input type="text" required name="Contact" class="form-control update_contact"/>
                    </p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Email</p>
                    <p class="h5 modal_update_color p-2 rounded ">
                         <input type="email"required  name="Email" class="form-control update_email"/>
                    </p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Father Name</p>
                    <p class="h5 modal_update_color p-2 rounded ">
                         <input type="text" required name="Father_name" class="form-control update_father_name"/>
                    </p>
                </div>
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Gender</p>
                    <p class="h5 modal_update_color p-2 rounded update_gender">
                    </p>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-4">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Address</p>
                    <p class="h5 modal_update_color p-2 rounded ">
                         <input type="text" required name="Address" class="form-control update_address"/>
                    </p>
                </div>

                <div class="col-3">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Assign Seat</p>
                    <p class="h5 modal_update_color p-2 rounded ">
                         <select class="form-select update_seat" required name="Seat_no" aria-label="Default select example">
                          
                        </select>
                    </p>
                </div>

                <div class="col-5">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Shift Code</p>
                    <p class="h5 modal_update_color p-2 rounded ">
                        <select class="form-select update_shift" required name="Shift_code" aria-label="Default select example">
                          
                        </select>
                    </p>
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer text-start "> 
        <input type="submit" class="btn btn-sm modal_update_color"   value="Update">

      </div>
    </div>
    </form>
  </div>
</div>
{{-- modal ends here --}}
                

{{-- modal box pay fees --}}
<div class="modal fade" id="payfeesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pay Fees</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('Student_payment')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="student.jpg" class="rounded img-fluid pay_image" alt="">
                    <input type="hidden" name="pay_id" class="pay_id">
                </div>
                <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Payed Till</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded pay_payed_till"></p>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row mt-1">
                 <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Name</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded pay_name"></p>
                </div>
                 <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Father's Name</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded pay_father_name"></p>
                </div>
            </div>
            <div class="row mt-6">
                 <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Mobile</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded pay_mobile"></p>
                </div>
                <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Fees Taken By Staff</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded ">
                         <select class="form-select pay_staff" required name="Staff_name" aria-label="Default select example">
                          
                        </select>
                </div>
            </div>
            <div class="row mt-1">
                
                <div class="col-6 p-1">
                <p class="h5 bg-secondary-subtle p-2 rounded ">Amount <span class="text-danger">Rs.</span><p>
                <p class="h5 bg-warning bg-opacity-50 p-2 rounded ">    
                    <input type="text" required name="Amount" class="form-control pay_amount text-danger fw-bold" id="floatingInput" placeholder="Enter Fees">
                </p>
                </div>
                 <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">Payment Mode</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded ">
                         <select class="form-select pay_payment_mode" required name="Payment_mode" aria-label="Default select example">
                            <option value="Online">Online</option>
                            <option value="Cash">Cash</option>
                        </select>
                </div>
            </div>
            <div class="row mt-1">
                 <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">From Month</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded ">
                        <input type="date" required name="From_month" class="pay_From_month">
                    </p>
                </div>
                <div class="col-6">
                    <p class="h5 bg-secondary-subtle p-2 rounded">To Month</p>
                    <p class="h5 bg-warning bg-opacity-50 p-2 rounded ">
                        <input type="date" required name="To_month" class="pay_To_month">
                    </p>
                </div>
            </div>
        </div>
      </div>
    
      <div class="modal-footer">
        <input type="submit" value="Pay" class="btn btn-warning">
        <button type="button" class="btn btn btn-secondary " data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- modal ends here --}}
@endsection


@push('javascript')
<script>
   $(document).ready(function () {
       /* view data  */
        $('body').on('click', '.viewdata', function () {
            
          var userURL = $(this).data('url');

          $.get(userURL, function (data) {
           //  $('#viewModal').modal('show'); ya toh bootstrap button se open krlo ya javascript se 
            $('.view_name').text(data.Name);
            $('.view_image').attr('src',"/Student_DP/"+data.Profile_image);
            $('.view_enrollment_id').text(data.Enrollment_id);
            $('.view_date_of_joining').text(data.Date_of_joining);
            $('.view_contact').text(data.Contact);
            $('.view_email').text(data.Email);
            $('.view_father_name').text(data.Father_name);
            $('.view_gender').text(data.Gender);
            $('.view_address').text(data.Address);
            $('.view_seat').text(data.Assign_seat);
            $('.view_shift').text(data.Shift_code);
            $('.view_staff').text(data.Staff);
            $('.view_payed_till').text(data.Payed_till);
            $('.view_fees').text(data.Student_fees);
          });

       });

         /* update data  */
        $('body').on('click', '.updatedata', function () {
            
          var userURL = $(this).data('url');
          $('#updateForm')[0].reset();

          $.get(userURL, function (data) {
           //  $('#updateModal').modal('show'); ya toh bootstrap button se open krlo ya javascript se 
            $('.update_id').val(data.id);
            $('.update_enrollment_id').text(data.Enrollment_id);
            $('.update_name_title').text(data.Name);
            $('.update_image').attr('src',"/Student_DP/"+data.Profile_image);
            $('.update_image_file').attr('value',data.Profile_image);
            $('.update_name').val(data.Name);
            $('.update_contact').val(data.Contact);
            $('.update_email').val(data.Email);
            $('.update_father_name').val(data.Father_name);
           // $('.update_gender').val(data.Gender);
            $('.update_address').val(data.Address);
            
            var gender_checked=data.Gender;
            if(data.Gender=="Male"){
                    $('.update_gender').html(`
                                <input type="radio" class="btn-check" checked required name="Gender"  id="success-outlined" value="Male" autocomplete="off" >
                                <label class="btn btn-outline-primary" for="success-outlined">Male</label>

                                <input type="radio" class="btn-check" required name="Gender" id="danger-outlined" value="Female" autocomplete="off">
                                <label class="btn btn-outline-pink " for="danger-outlined">Female</label>
                    `);
            }
            else{
                 $('.update_gender').html(`
                                <input type="radio" class="btn-check" required name="Gender"  id="success-outlined" value="Male" autocomplete="off" >
                                <label class="btn btn-outline-primary" for="success-outlined">Male</label>

                                <input type="radio" class="btn-check" checked required name="Gender" id="danger-outlined" value="Female" autocomplete="off">
                                <label class="btn btn-outline-pink " for="danger-outlined">Female</label>
                    `);
            }
            var shift_selected=data.Shift_code;
            var seat_selected=data.Assign_seat;

            $('.update_seat').html("");
            $('.update_shift').html("");

            data.seat.forEach(seat_function);
            function seat_function(seat_table){ 
                var selected="";
                if(seat_table.Seat_no==seat_selected){
                    selected="selected";
                }
                $('.update_seat').append(`
                <option  ${selected} value="${seat_table.Seat_no}"> 
                    ${seat_table.Seat_no} 
                </option>`);
            }
            data.shift.forEach(shift_function);
            function shift_function(shift_table){ 
                var selected="";
                if(shift_table.Shift_code==shift_selected){
                    selected="selected";
                }
                $('.update_shift').append(`
                <option ${selected} value="${shift_table.id}"> 
                    ${shift_table.Shift_code} -
                    ${shift_table.Shift_name} -
                    ${shift_table.Entering_time} ${shift_table.Entering_zone} =
                    ${shift_table.Leaving_time} ${shift_table.Leaving_zone}
                    ${shift_table.Fees} 
                </option>`);
            }
          
           
         
          });
       });

     //pay fees 
        $('body').on('click', '.pay_Fees', function () {
            
          var userURL = $(this).data('url');

          $.get(userURL, function (data) {
            $('.pay_image').attr('src','/Student_DP/'+data.Profile_image);
            $('.pay_payed_till').text(data.Payed_till);
            $('.pay_name').text(data.Name);
            $('.pay_father_name').text(data.Father_name);
            $('.pay_mobile').text(data.Contact);
            $('.pay_amount').val(data.Student_fees);
            $('.pay_id').val(data.id);
            
            $('.pay_staff').html("");
            data.staff_info.forEach(staff_function);
            function staff_function(staff_table){ 
                $('.pay_staff').append(`
                <option value="${staff_table.Name}"> 
                    ${staff_table.Name} 
                </option>`);
            }
          });
      });
  });
   
</script>
@endpush