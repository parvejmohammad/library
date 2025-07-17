
{{-- navbar start --}}

<nav class="navbar navbar-expand-lg bg-body-tertiary p-0"  data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand " href="{{route('welcome')}}"><img src="{{url('logo.png!sw800')}}" alt="TSPL" width="40" height="40"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{isset($active_navbar_Home)?$active_navbar_Home:""}}" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link  {{isset($active_navbar_Fees)?$active_navbar_Fees:""}}" href="{{route('mixContent',1)}}">Fees Structure</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link {{isset($active_navbar_Income)?$active_navbar_Income:""}}" href="{{route('IncomeExpense')}}">Income&Expense</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{isset($active_navbar_Gallery)?$active_navbar_Gallery:""}}" href="{{route('mixContent',3)}}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{isset($active_navbar_About)?$active_navbar_About:""}}" href="{{route('mixContent',4)}}">About&Contact</a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin')}}" class="nav-link">Config</a>
        </li>
        </ul>
         
        <span class="navbar-text text-light">The Success Point Library &nbsp;</span>
        <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>
{{-- navbar end --}}
