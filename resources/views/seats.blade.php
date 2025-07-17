@extends('layout.start_layout')

@section('title')
Seat Arrangement
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
<div class="container">
    <div class="row">
        <div class="col"><h1>Seat Allotment</h1></div>
    </div>
    <div class="form">
        <div class="row">
            <div class="col-3">
                <div class="form-floating">
                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Staff</option>
                                        <option value="1">Morning</option>
                                        <option value="2">Evening</option>
                                        <option value="3">Night</option>
                                    </select>
                    <label for="floatingInput">Shift</label>
                </div>
            </div>
            <div class="col-3">
                <div class="form-floating">
                    <input type="time" class="form-control" id="floatingInput" placeholder="Adhaar number">
                    <label for="floatingInput">From </label>
                </div>
            </div>
            <div class="col-3">
                <div class="form-floating">
                    <input type="time" class="form-control" id="floatingInput" placeholder="Adhaar number">
                    <label for="floatingInput">To</label>
                </div>
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-info btn-lg">
            </div>
           
        </div>
    </div>
    
</div>
{{-- container ends here --}}
@endsection


