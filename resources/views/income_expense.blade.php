@extends("layout.start_layout")

@section('title')
Income & Expenditure
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

<div class="container">
    <div class="card text-center">
        <div class="card-header bg-dark text-light">
            <h2>Calculate Your Saving</h2>
        </div>
        <form action="{{route('calsyInvestment')}}" method="get">
            @csrf
        <div class="card-body bg-secondary-subtle">
            <div class="row bg-success bg-opacity-25 text-success p-3">
                <div class="col-3">
                    <h5>Income Recieved From Student Fees :</h5>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="date" name="start" class="form-control text-success" id="floatingInput" placeholder="staring month">
                        <label for="floatingInput" class="text-success">From</label>
                    </div> 
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="date" name="end" class="form-control text-success" id="floatingInput" placeholder="Ending month">
                        <label for="floatingInput" class="text-success">To</label>
                    </div> 
                </div>
            </div>
            {{-- row end --}}
            <div class="row bg-danger bg-opacity-25 text-danger p-3">
                <div class="col-3">
                    <h5>Library Maintainance Cost:</h5>
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="number" name="rent_cost" class="form-control text-danger" id="floatingInput" placeholder="staring month">
                        <label for="floatingInput" class="text-danger">Building Rent:</label>
                    </div> 
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="number" name="water_cost" class="form-control text-danger" id="floatingInput" placeholder="Ending month">
                        <label for="floatingInput" class="text-danger">Water Cost:</label>
                    </div> 
                </div>
            </div>
            {{-- row end --}}
            <div class="row bg-danger bg-opacity-25 text-danger p-3">
                <div class="col-3">
                
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="number" name="electricity_cost" class="form-control text-danger" id="floatingInput" placeholder="staring month">
                        <label for="floatingInput" class="text-danger">Electricity Cost:</label>
                    </div> 
                </div>
                <div class="col-3">
                    <div class="form-floating">
                        <input type="number" name="mix_cost" class="form-control text-danger" id="floatingInput" placeholder="Ending month">
                        <label for="floatingInput" class="text-danger">Miscellaneous:</label>
                    </div> 
                </div>    
            </div>
            <div class="row">
                <div class="col-5"></div>
                <div class="col-2">
                    <div>
                        <input type="submit" value="Calculate" class="btn btn-primary btn-lg calsy">
                     </div>
                </div>
                <div class="col-5"></div>
            </div>
            {{-- row end --}}
            <div class="row p-3 text-start">
                <div class="col">
                    <p class="fs-3">Income:</p>
                    <p class="fs-3">Expenditure:</p>
                    <p class="fs-3 text-bg-success w-25" >Saving=50,000</p>
                    <p class="fs-3 text-bg-danger w-25" >Loss=50,000</p>
                </div>
            </div>
        </div>
    </form>
    </div>
       
    {{-- row end --}}
</div>
@endsection

