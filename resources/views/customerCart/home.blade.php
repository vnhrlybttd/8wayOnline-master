@extends('layouts.cart')
@section('content')

<div class="shadow-lg">
    <img src="{{asset('image/cover.jpg')}}" alt="No Image" class="img-fluid">
</div>


@if($products->isEmpty())
@else




<div class="container py-5">

    <h3 class="text-uppercase text-center">Shop by Category</h3>

   
    <div class="row">
        @foreach ($category as $categoryView)
    
            <div class="col-lg-4 mt-2 hvr-grow">
                <a href="{{route('order.category',$categoryView->id)}}">
                <div class="card bg-dark text-white" data-aos="zoom-out-down">
                    <img src="{{asset('category_photo/'.$categoryView->category_photo)}}" class="card-img"
                    alt="..." style="object-fit:cover; width: 100%; height:10rem; opacity:0.7;"> 
                    <div class="card-img-overlay">
                      <h5 class="card-title text-center text-bold text-uppercase h2" style="position: relative; top:35px;">{{$categoryView->category_name}}</h5>
                    </div>
                  </div>
                </a>
            </div>
     
        @endforeach
    </div>
   
</div>










<div class="container py-5">
    <h3 class="text-uppercase text-center" style="color:black;">Products</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-deck">
                @foreach ($products as $productView)
                <div class="col-lg-4 col-sm-12 col-md-12 mt-3 hvr-grow">
                    <div class="card" data-aos="zoom-out-down">
                        <img src="{{asset('image/'.$productView->image)}}" class="card-img-top img-fluid"
                            style="object-fit: cover; width: 100%; height:15rem " alt="...">
                        <div class="card-footer bg-success">
                            <h6 class="text-center text-bold" style="color: white">{{$productView->products}}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a href="{{route('order.products')}}" style="text-decoration: none"
            class="btn btn-outline-success text-uppercase rounded-pill btn-lg">
            View all
        </a>
    </div>

</div>
@endif


<div class="bg-dark text-white">
    <div class="container">
        <div class="d-flex justify-content-center pt-5">
            <h5 class="text-uppercase text-bold">How it works</h5>
        </div>
        <div class="row text-center py-5 text-uppercase">
            <div class="col-lg-3 col-sm-12" data-aos="fade-up-right">
                <i class="fas fa-shopping-cart h1 border border-secondary rounded-pill p-5  hvr-grow"
                    style="color: #7BD33F"></i>
                <p>Place Orders</p>
            </div>
            <div class="col-lg-3 col-sm-12" data-aos="fade-up-left">
                <i class="fas fa-money-bill-wave h1 border border-secondary rounded-pill p-5  hvr-grow"
                    style="color: #7BD33F"></i>
                <p>Make a Payment</p>
            </div>
            <div class="col-lg-3 col-sm-12" data-aos="fade-up-right">
                <i class="fas fa-truck-loading  h1 border border-secondary rounded-pill p-5  hvr-grow"
                    style="color: #7BD33F"></i>
                <p>Receive your order thru courier</p>
            </div>
            <div class="col-lg-3 col-sm-12" data-aos="fade-up-left">
                <i class="fas fa-store h1 border border-secondary rounded-pill p-5  hvr-grow"
                    style="color: #7BD33F"></i>
                <p>Or pick up from our store</p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="text-center pt-5">
        <p class="text-uppercase text-bold">FAQ</p>
        <h5 class="text-uppercase font-weight-bold">Frequently Asked Questions</h5>
    </div>

    <div class="card-deck my-5">
        <div class="card" data-aos="flip-left">
            <div class="text-center">
                <i class="fas fa-comments h4 rounded-pill p-4"
                    style="color: white; background-color:#7BD33F; position: relative; bottom: 35px;"></i>
            </div>
            <div class="card-body  text-center">
                <h6 class="card-title font-weight-bold">Do you have stocks of fruits everyday?</h6>
                <p class="card-text">No. We do not stock fruits to keep them fresh and deliver same day we receive our
                    fruit supply. </p>
            </div>
        </div>
        <div class="card" data-aos="flip-right">
            <div class="text-center">
                <i class="fas fa-comments h4 rounded-pill p-4"
                    style="color: white; background-color:#7BD33F; position: relative; bottom: 35px;"></i>
            </div>
            <div class="card-body  text-center">
                <h6 class="card-title font-weight-bold">Do you have half kilos of fruits?</h6>
                <p class="card-text">No. Order should be minimum of 1 kilo except for lemons /pc </p>
            </div>
        </div>
        <div class="card" data-aos="flip-left">
            <div class="text-center">
                <i class="fas fa-comments h4 rounded-pill p-4"
                    style="color: white; background-color:#7BD33F; position: relative; bottom: 35px;"></i>
            </div>
            <div class="card-body  text-center">
                <h6 class="card-title font-weight-bold">Do you deliver? </h6>
                <p class="card-text">Yes. We can deliver via Grab, Angkas, lalamove and all other couriers. </p>
            </div>
        </div>
        <div class="card" data-aos="flip-right">
            <div class="text-center">
                <i class="fas fa-comments h4 rounded-pill p-4"
                    style="color: white; background-color:#7BD33F; position: relative; bottom: 35px;"></i>
            </div>
            <div class="card-body  text-center">
                <h6 class="card-title font-weight-bold">Can you book a courier for me?</h6>
                <p class="card-text">Yes. But please do not rush us as we also attend to other customers while preparing
                    your orders.
                    We will inform you once the rider is on the way to deliver your orders. </p>
            </div>
        </div>
    </div>

</div>


{{-- 
<section>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($products as $productView)
        <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
class="{{ $loop->first ? 'active' : '' }}"></li>
@endforeach
</ol>
<div class="carousel-inner">
    @foreach ($products as $productView)
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <img src="{{asset('image/'.$productView->image)}}" alt="No Image" class="d-block w-100 h-100"
            style="object-fit: cover;">
        <div class="carousel-caption">


            <h1>{{$productView->products}}</h1>
            <a class="btn btn-success btn-lg text-bold text-uppercase d-lg-none d-xl-none rounded-pill">ORDER NOW</a>

        </div>
    </div>
    @endforeach
</div>
<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
</section> --}}




@endsection
