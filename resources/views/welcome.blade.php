@extends('layout.start_layout')

@section('title')
Welcome
@endsection
 @section('stylesheet')
<style>
    .active_navbar_link{
  background:#D81159;
  /*  background:#6d676e;*/ 
}
</style>
@endsection 
@section('content')
@extends('layout.navbar')
{{-- @if(isset($mail_status) && $mail_status==="success")
<div class="position-relative">
  <div class="alert alert-success alert-dismissible fade show w-25 position-absolute top-0 start-0" role="alert">
      Fees Reminder Mail has sent.{{$mail_status}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif --}}
    <div class="container">
        {{-- searchbar --}}
        <div class="row mt-3">
            <div class="col-6 m-auto mt-5">
                    <form action="{{route('searchStudent')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search_student" required class="form-control form-control-lg" placeholder="Search Student" aria-label="Recipient’s username" aria-describedby="button-addon2">
                            <input class="btn btn-lg btn-danger" type="submit" id="button-addon2" value="Find">
                        </div>
                    </form>
            </div>
            {{-- cards --}}
        </div>
        <div class="row mt-5 m-auto">
           
           <div class="col-4">
                <div class="card text-center" style="max-width: 18rem;min-height:12rem;border:5px solid #7A8CF0">
                        <div class="card-header h5 " style="background:#7A8CF0"> Student Detail</div>
                        <div class="card-body">
                            <form action="{{route('singleStudent')}}" method="get">
                                <input type="submit" class="btn btn-sm" style="background: #7A8CF0" value="Add New Student">
                            </form>
                            <form action="{{route('student')}}" method="get">
                                <input type="submit" class="btn btn-sm"  style="background: #7A8CF0" value="View All Students">
                            </form>
                            <h5 class="card-title pt-3 text-primary" >___________</h5>
                        </div>
                </div>
           </div>
           <div class="col-4">
                <div class="card text-center" style="max-width:18rem;min-height:12rem;border:5px solid #F8FF95">
                        <div class="card-header h5 " style="background:#F8FF95">Pending Fees</div>
                        <div class="card-body" >
                            <p class="text-warning fs-2">{{isset($pending_fees)?$pending_fees:"";}}</p>
                            <td><!-- Button trigger modal box view data -->
                                <button class="btn btn-sm sendreminder" style="background:#f8ff95c7"  data-url="{{route('sendReminder')}}" data-bs-toggle="modal" data-bs-target="#sendReminderModal">Send Reminder</button>
                            </td>
                            <h5 class="card-title pt-3 text-warning">___________</h5>
                        </div>
                </div>
           </div>
           <div class="col-4">
                <div class="card text-center" style="max-width:18rem;min-height:12rem;border:5px solid #7bE77E">
                        <div class="card-header h5" style="background:#7BE77E">This Month Collection</div>
                        <div class="card-body">
                            <p class="text-center text-success fs-2">{{isset($total)?$total:"";}}</p>
                            <h5 class="card-title pt-5 text-success">___________</h5>
                        </div>
                </div>
           </div>
        </div>
        {{-- container ends here --}}
    </div>
    
   {{-- modal box view view data--}}
<div class="modal fade" id="sendReminderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title modal_view_color p-2 rounded-left fs-5 view_name" id="staticBackdropLabel">Pending Fees</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col">
                        <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead class="table-warning">
                                        <th>Name</th>
                                        <th>Father name</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>Seat Assigned</th>
                                        <th>Fees</th>
                                        <th>Payed till</th>
                                        <th>Tick to Send Mail</th>
                                    </thead>
                                        <tbody class="tick_student_info">                                     
                                        </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer text-start ">
        <form action="{{route('send_Mail')}}" method="GET">
            @csrf
            <input type="hidden" value="786" name="mail_id">
           <input type="submit" value="Send Mail To All" class="btn btn-danger">
       </form>
      </div>
    </div>
  </div>
</div>
{{-- modal ends here --}}
 
@endsection


@push('javascript')
<script>
   $(document).ready(function () {
       /* view data  */
        $('body').on('click', '.sendreminder', function () {
            
          var userURL = $(this).data('url');

          $.get(userURL, function (data) {
           
            $('.tick_student_info').html("");
            data.forEach(reminder);
            let count=0;
            function reminder(unpaid_student){ 
              
                $('.tick_student_info').append(`
                        <tr>
                          <td>${unpaid_student.Name}</td>
                          <td>${unpaid_student.Father_name}</td>
                          <td>${unpaid_student.Contact}</td>
                          <td>${unpaid_student.Gender}</td>
                          <td>${unpaid_student.Assign_seat}</td>
                          <td>${unpaid_student.Student_fees}</td>
                          <td>${unpaid_student.Payed_till}</td>
                          <td> 
                               <form action="send_Mail"  method="GET">
                                @csrf
                                <input type="hidden" name="mail_id" value="${unpaid_student.id}">
                                <input type="submit" value="Send Reminder" class="btn btn-info">
                                </form>
                          </td>
                        </tr>    
                        `);
            }
           
          });
/*send reminder function closed*/
       });

       /* ready function closed*/
    });

   
</script>
@endpush