@extends('layout.start_layout')

@section('title')
{{$title}}
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
        <div class="col-12 text-center">
            <h2>{{$title}}</h2>
        </div>
        <div class="col-6">
            <h3>Student Details</h3>
            <p>Name: {{$student->Name}}<br>
               Father's Name: {{$student->Father_name}}<br>
               Address: {{$student->Address}}<br>
               Contact: {{$student->Contact}}</p>
            
        </div>
        <div class="col-6 text-end">
            <h3 >Payment Details</h3>
            <p>Payment Mode: {{$fee->Payment_mode}}<br>
               Month: {{date('d/m/Y',strtotime($fee->From_month))}} - {{date('d/m/Y',strtotime($fee->To_month))}}<br>
               Amount: {{$fee->Amount}}<br>
               Status: <span class="text-success">{{$fee->Status}}</span>
            </p>
               <p class="fst-italic align-text-bottom">Date: {{$date}}</p>
        </div>
    </div>
</div>
@endsection