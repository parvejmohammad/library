<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("bootstrap.css")}}">
    <style>
        .carousel_image{
            height: 80vh;
            position: relative;
        }
        .carousel_image img{
            position: absolute;
            height:100%;
            width:100%;
        }
   .active_navbar_link{
  background:#D81159;
  
  /*  background:#6d676e;*/ 
}
    </style>
</head>
<body>

    @include('layout.navbar')


 @if($id==1)
 <div class="container mt-5">
    <div class="row">
        <h3>Fee Structure</h3>
        <div class="col">
            <table class="table  table-hover table-striped">
                <thead >
                    <tr>
                        <th>S.no</th>
                        <th>Shift</th>
                        <th>Entry Time</th>
                        <th>Exit Time</th>
                        <th>Fees</th>
                    </tr>
                </thead >
                <tbody>
                    @php
                        $count=1;
                    @endphp
                    @foreach($shift_ as $key=>$value)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$value->Shift_name}}</td>
                        <td>{{$value->Entering_time}}{{$value->Entering_zone}}</td>
                        <td>{{$value->Leaving_time}}{{$value->Leaving_zone}}</td>
                        <td>{{$value->Fees}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col text-secondary">
            <p>More Shifts & Timings will be provided as per student need</p>
        </div>
    </div>
 </div>


@elseif($id==2)
 




@elseif($id==3) 
     <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>The Success Point Library : Gallery</h2>

                <div id="carouselExampleCaptions" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active carousel_image" data-bs-interval="3000">
                        <img src="{{url('library4.jpg')}}" class="d-block w-100" alt="">
                        <div class="carousel-caption d-none d-md-block text-light" >
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item carousel_image" data-bs-interval="3000">
                        <img src="{{url('library3.jpg')}}" class="d-block w-100" alt="">
                        <div class="carousel-caption d-none d-md-block text-light">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item carousel_image" data-bs-interval="3000">
                        <img src="{{url('library2.avif')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block text-light">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item carousel_image" data-bs-interval="3000">
                        <img src="{{url('library1.webp')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block text-light">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>



            </div>
        </div>
    </div>

@elseif($id==4)


     <div class="container mt-4">
         <div class="row mt-4">
                <div class="col">
                    <h3>The Success Point Library</h3>
                    <p>To ensure that library facilities serve as information hubs for communities, including local communities and educational settings, and as learning spaces where people can engage with knowledge and information while fostering rich creativity.</p>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Wifi
                    </button>
                    <button type="button" class="btn btn-danger m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Water
                    </button>
                    <button type="button" class="btn btn-warning m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ CCTV
                    </button>
                    <button type="button" class="btn btn-primary m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Ac
                    </button>
                    <button type="button" class="btn btn-secondary m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Fan
                    </button>
                    <button type="button" class="btn btn-success m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Parking
                    </button>
                    <button type="button" class="btn btn-warning m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Affordable Charges
                    </button>
                    <button type="button" class="btn btn-info m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Maps
                    </button>
                    <button type="button" class="btn btn-danger m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Inverter
                    </button>
                    <button type="button" class="btn btn-dark m-1" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: 1rem;">
                       ✔ Night Shift(24×7)
                    </button>
                </div>
            </div>

           <div class="row row-cols-1 row-cols-md-3 g-4  p-5">
                <div class="col">
                    <div class="card">
                    <img src="{{url('librarian2.jpg')}}" class="card-img-top" alt="..." style="height:350px;">
                    <div class="card-body">
                        <h5 class="card-title">	Arthur Hackett</h5>
                        <p class="card-text">To ask why we need libraries at all, when there is so much information available elsewhere, is about as sensible as asking if roadmaps are necessary now that there are so very many roads.” Eleanor Crumblehulme says “Cutting libraries during a recession is like cutting hospitals during a plague.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Contact: (201) 610-0500</small>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <img src="{{url('librarian4.jfif')}}" class="card-img-top"  style="height:350px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Alexander K. Ayala</h5>
                        <p class="card-text">Libraries are essential in a process of giving citizens access to knowledge. In digital times they are needed more than ever before. In times of the internet, everyone can visit a library without leaving home. It’s just a matter of opening a library website, and you can not only borrow an ebook but also ask the librarian an online question. Most importantly, however, libraries are the places where you can expect smart and clear answers to even the most difficult questions.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Contact: 619-355-5035</small>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                    <img src="{{url('librarian5.jpg')}}" class="card-img-top"  style="height:350px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">	Dr. Hector Herman Sr.</h5>
                        <p class="card-text">I have found the most valuable thing in my wallet is my library card.” Visit your library, get your library card, and you’ll be able to borrow a print or electronic book, use free internet, or attend a course that will improve your digital skills</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Contact: (425) 743-7350</small>
                    </div>
                    </div>
                </div>
            </div>
           
        </div>
    



@endif

    <script src="{{asset("bootstrap.js")}}"></script>
    <script src="{{asset("jQuery.js")}}"></script>
    
</body>
</html>