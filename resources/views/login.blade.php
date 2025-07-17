@extends('layout.start_layout')
@section('title')
 Login 
 @endsection
 @section('content')
    <div class="container">

       
        <div class="row pt-5">
          <div class="col-4 m-auto mt-5">
            <div class="card  text-light border-danger">
                <div class="card-header text-center bg-danger">
                   <h1>Login</h1>
                </div>
                <form action="{{route('loginMatch')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="input-group">
                            <div class="input-group mb-3">
                                <span class="input-group-text border-danger text-danger" id="basic-addon1">Email</span>
                                <input type="email" name="email" class="form-control border-danger text-danger" placeholder="Enter Login Id" aria-label="email" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text border-danger text-danger" id="basic-addon1">Password</span>
                                <input type="password" name="password" class="form-control border-danger text-danger" placeholder="Enter Password" aria-label="password" aria-describedby="basic-addon1">
                            </div>
                          <button type="submit" class="btn btn-danger">Submit</button>   
                    </div>    
                </div>
                </form>
                <div class="card-footer bg-danger">
                    <div>
                        <a href="" class="text-decoration-none text-light">Library management@2025</a>
                    </div>                    
                </div>
                @if($errors->any())
                <div class="alert text-start text-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
          </div>
        </div>
        {{-- container ends here --}}
    </div>
@endsection