@extends('layouts.customer')


@section('content')



<div class="mb-5 ">
    <nav class="navbar navbar-dark fixed-top shadow-lg" style="background-color: black">
        <div class="container">
            <div class="text-center text-white text-uppercase text-bold"><span>8wayOnline</span></div>
            <div class="sidebar-brand-icon text-white"><i class="fas fa-store-alt"></i></div>
        </div>
    </nav>
</div>



<form action="{{ action('CustomerCartController@store') }}" method="POST"
    onSubmit="document.getElementById('submit').disabled=true;">
    @csrf

    <div>

        <div class="d-flex justify-content-between">
            @if ($message = Session::get('success'))
            @else
            <div>
                <h2 class="text-bold text-dark">Cart <i class="fas fa-shopping-cart"></i></h2>
            </div>
            <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">

                <button type="button" class="btn btn-success btn-lg btn-block  shadow-lg" data-toggle="modal"
                    data-target="#exampleModal"> Submit Order</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Submit Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">



                                Are you sure you want to submit your order?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                @endif
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if ($message = Session::get('success'))
        <hr>
        <div class="alert alert-success  text-center">
            <h1 class="display-1 text-primary"><i class="fas fa-laugh-wink"></i></h1>
            <p>{{ $message }}</p>
            <p>Want to order again? Click here <a class="btn btn-primary btn-sm" href="{{route('orders.create')}}">Order
                    Form</a></p>
        </div>


        @else
        <div class="row">
            <div class="col-lg-4">
                <hr>

                <input name="order_status" value="1" hidden>
                <input name="invoice_status" value="1" hidden>
                <input name="payment_status" value="1" hidden>

                <h6 class="text-bold text-uppercase">Information <i class="fas fa-info-circle"></i></h6>
                <div class="card ">
                    <div class="card-body shadow">

                        @if ($products->isEmpty())
                        <div class="col-lg-12">

                            <div class="container-fluid">
                                <div class="text-center text-danger m-5">
                                    <h1 class="display-1"><i class="fas fa-times"></i></h1>
                                    <p class="lead">
                                        You cannot enter any credentials
                                    </p>
                                </div>
                            </div>

                        </div>
                        @else
                        <div class="form-group">
                            <label for="name">Full Name </label>
                            <input class="form-control form-control-sm" name="full_name" placeholder="Ex. John Robert"
                                type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-sm" name="email"
                                placeholder="Ex. johnrobert@gmail.com" type="email" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input class="form-control form-control-sm" name="phone_number"
                                placeholder="Ex. 09012301234" type="text">
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="unit">Address Line </label>
                                    <textarea class="form-control form-control-sm" name="street_address"
                                        placeholder="Ex. Unit 2000 Jazz Condominium Manila" type="text" id="unit"
                                        required></textarea>

                                </div>
                            </div>



                        </div>

                        @endif
                    </div>
                </div>
                <h6 class="text-bold text-uppercase mt-2">Payment Method <i class="fas fa-money-check-alt"></i></h6>
                <div class="card">
                    <div class="card-body  shadow">
                        @if ($products->isEmpty())
                        <div class="col-lg-12">

                            <div class="container-fluid">
                                <div class="text-center text-danger m-5">
                                    <h1 class="display-1"><i class="fas fa-times"></i></h1>
                                    <p class="lead">
                                        You cannot enter any credentials
                                    </p>
                                </div>
                            </div>

                        </div>
                        @else
                        <div class="row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineRadio1" value="1" checked
                                    onclick="cod()" name="payment_method">
                                <label class="form-check-label" for="inlineRadio1">Cash On Delivery</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineRadio2" value="2" onclick="bdo()"
                                    name="payment_method">
                                <label class="form-check-label" for="inlineRadio2">BDO</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineRadio3" value="3"
                                    onclick="gcash()" name="payment_method">
                                <label class="form-check-label" for="inlineRadio3">GCASH</label>
                            </div>
                        </div>
                        <div id="bdoDiv" style="display: none">
                            <hr>
                            <h6 class="text-bold text-uppercase text-center">Account Number: 007070000771</h6>
                            <h6 class="text-bold text-uppercase text-center">Account Name: Abegail Baja</h6>
                            <p class="bg-info text-white p-2"><small><i class="fas fa-info-circle"></i> Do not forget to
                                    copy the account number for your online payment</small></p>
                        </div>
                        <div id="gcashDiv" style="display: none">
                            <hr>
                            <h6 class="text-bold text-uppercase text-center">GCash Number: 09778267422</h6>
                            <h6 class="text-bold text-uppercase text-center">GCash Name: Abegail Baja</h6>
                            <p class="bg-info text-white p-2"><small><i class="fas fa-info-circle"></i> Do not forget to
                                    copy the account number for your online payment</small></p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        <h6 class="text-bold text-uppercase ">Delivery Options <i class="fas fa-truck"></i></h6>
                    </div>
                    <div><small class="text-info"><i class="fas fa-info-circle"></i> Delivery Fee may vary</small></div>
                </div>

                <div class="card">
                    <div class="card-body  shadow">
                        @if ($products->isEmpty())
                        <div class="col-lg-12">

                            <div class="container-fluid">
                                <div class="text-center text-danger m-5">
                                    <h1 class="display-1"><i class="fas fa-times"></i></h1>
                                    <p class="lead">
                                        You cannot enter any credentials
                                    </p>
                                </div>
                            </div>

                        </div>
                        @else
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" class="custom-control-input" checked
                                    name="delivery_options" value="1">
                                <label class="custom-control-label" for="customRadioInline2"><i class="fas fa-home"></i>
                                    Home Delivery </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" class="custom-control-input"
                                    name="delivery_options" value="2">
                                <label class="custom-control-label" for="customRadioInline1"><i
                                        class="fas fa-store-alt"></i> Pick up from Store </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"> <small class="text-success">Courier Services Available!</small></div>
                            <div class="col-12"> <small class="text-center">Angkas, Grab, Joyride, Lalamove, Move
                                    It</small></div>
                        </div>


                        @endif
                    </div>
                </div>
                <h6 class="text-bold text-uppercase mt-2">Comments <i class="fas fa-comment-alt"></i></h6>
                <div class="card">
                    <div class="card-body  shadow-lg">
                        @if ($products->isEmpty())
                        <div class="col-lg-12">

                            <div class="container-fluid">
                                <div class="text-center text-danger m-5">
                                    <h1 class="display-1"><i class="fas fa-times"></i></h1>
                                    <p class="lead">
                                        You cannot enter any credentials
                                    </p>
                                </div>
                            </div>

                        </div>
                        @else
                        <textarea class="form-control" name="comments" placeholder="Comment here"></textarea>
                        @endif
                    </div>
                </div>
            </div>



            <div class="col-lg-8">
                <hr>
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-bold text-uppercase">Products <i class="fas fa-box-open"></i></h6>
                    </div>
                    {{-- <div class="d-xl-none d-lg-none d-md-none justify-content-end"> <small class="text-info"><i
                                class="fas fa-info-circle"></i> Scroll for more products</small> </div> --}}

                    <div class="justify-content-end"> <small class="text-info"><i class="fas fa-info-circle"></i> Click
                            to enlarge images</small> </div>
                </div>

                <div class="row bg-light" id="scroller">
                    @if ($products->isEmpty())
                    <div class="col-lg-12">

                        <div class="container-fluid">
                            <div class="text-center text-danger m-5">
                                <h1 class="display-1"><i class="fas fa-exclamation-triangle"></i></h1>
                                <p class="lead">
                                    I'm sorry! but the Product Table is empty.
                                </p>
                            </div>
                        </div>

                    </div>
                    @else




                    @foreach ($category as $key => $categoryView)
                    <div class="col-lg-12">
                        <h5 class="text-dark text-uppercase border-bottom border-secondary">
                            {{{$categoryView->category_name}}}</h5>
                    </div>
                    @foreach ($products as $productView)
                    @if($categoryView->category_name === $productView->category_name_link)
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <!-- CARD -->
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <span data-toggle="modal" data-target="#image{{$productView->id}}">
                                        <img src="{{asset('image/'.$productView->image)}}" alt="No Image"
                                            class="card-img-top" height="200" style="object-fit: cover; width: 100%;">
                                    </span>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body h-100">
                                        <div class="d-flex">
                                            <h5 class="card-title text-bold text-dark">{{$productView->products}}
                                            </h5>
                                        </div>
                                       
                                         @if ($productView->sale_status === 1)
                                            <div>
                                                <del class="text-danger">{{$productView->sale}}
                                                    <small>{{$productView->unit}}</small></del>
                                                {{$productView->price}} <small>{{$productView->unit}}</small>
                                            </div>
                                            @elseif($productView->sale_status === 0)
                                            <div>
                                                {{$productView->price}} <small>{{$productView->unit}}</small>
                                            </div>
                                            @endif

                                            


                                            <p class="card-text border-top border-secondary">
                                                <small>{{$productView->description}}</small></p>
                                            @if ($productView->stocks <= 0) <div
                                                class="alert alert-danger text-center text-bold" role="alert">
                                                {{$productView->products}} is Out of Stock!
                                    </div>
                                    @else

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Product Id</div>
                                        <input class="form-control" type="number" name="product_id[]"
                                            value="{{$productView->id}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Product Name</div>
                                        <input class="form-control" type="text" name="product_name[]"
                                            value="{{$productView->products}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Product Unit</div>
                                        <input class="form-control" type="text" name="product_unit[]"
                                            value="{{$productView->unit}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Price</div>
                                        <input class="form-control" type="number" name="priceOrder[]"
                                            value="{{$productView->price}}" hidden>
                                    </div>
                                    @endif

                                </div>


                            </div>
                        </div>

                        <!-- CARD -->

                        <!-- CARD FOOTER-->
                        <div class="card-footer text-muted">
                            <div class="form-group">
                                <div class="label" for="Quantity">Quantity</div>
                                <input class="form-control" type="number" name="quantity[]" min="0" max="20" value="0"
                                    required>
                            </div>
                        </div>
                        <!-- CARD FOOTER-->


                        <!-- Modal -->
                        <div class="modal fade" id="image{{$productView->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$productView->products}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('image/'.$productView->image)}}" alt="No Image"
                                            class="img-fluid" height="300" style="object-fit: cover; width: 100%;">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->



                    </div>
                    @endif
                </div>
                <!--end of row INSIDE-->




                @endforeach
                @endforeach
                @endif






            </div>
            <!--END OF COL-8 -->
        </div>
        <!--END OF WHOLE ROW-->

        <div class="col-lg-12 d-xl-none d-lg-none d-md-none mt-2">
            <hr>
            <button type="button" class="btn btn-success btn-lg btn-block  shadow-lg" data-toggle="modal"
                data-target="#exampleModal"> Submit Order</button>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Submit Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">



                            Are you sure you want to submit your order?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    </div>


    @endif


</form>



<style>
    #scroller {

        height: 980px;
        overflow: scroll;

    }

</style>

<script>
    function cod() {
        document.getElementById("bdoDiv").style.display = "none";
        document.getElementById("gcashDiv").style.display = "none";
    }

    function bdo() {
        document.getElementById("bdoDiv").style.display = "block";
        document.getElementById("gcashDiv").style.display = "none";
    }

    function gcash() {
        document.getElementById("bdoDiv").style.display = "none";
        document.getElementById("gcashDiv").style.display = "block";
    }

   

</script>


@endsection
