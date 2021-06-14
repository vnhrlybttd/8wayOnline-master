@extends('layouts.app')


@section('content')




<div class="row">
    <div class="col-12">


        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div>

                <div class="d-flex justify-content-between">
                    @if ($message = Session::get('success'))
                    @else
                    <div>
                        <h2 class="text-bold text-dark">Cart <i class="fas fa-shopping-cart"></i></h2>
                    </div>
                    <div>

                        <button type="submit" class="btn btn-success btn-lg btn-block"
                            onclick="return confirm('Are you sure?')"> Submit Order</button>
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
                    <p>Want to order again? Click here <a class="btn btn-primary btn-sm"
                            href="{{route('orders.create')}}">Order
                            Form</a></p>
                </div>


                @else
                <div class="row" style="height: 75vh">
                    <div class="col-lg-4">
                        <hr>

                        <input name="order_status" value="1" hidden>
                        <input name="invoice_status" value="1" hidden>
                        <input name="payment_status" value="1" hidden>

                        <h5 class="text-bold text-uppercase">Information <i class="fas fa-info-circle"></i></h5>
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
                                    <label for="name">Full Name</label>
                                    <input class="form-control form-control-sm" name="full_name"
                                        placeholder="Ex. John Robert" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control form-control-sm" name="email"
                                        placeholder="Ex. johnrobert@yahoo.com" type="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone Number</label>
                                    <input class="form-control form-control-sm" name="phone_number"
                                        placeholder="Ex. 0901-230-1234" type="text" required>
                                </div>
                                <hr>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="unit">Address Line </label>
                                            <textarea class="form-control form-control-sm" name="street_address"
                                                placeholder="Ex. Unit 2000 Jazz Condominium Manila" type="text"
                                                id="unit" required></textarea>

                                        </div>
                                    </div>



                                </div>

                                @endif
                            </div>
                        </div>
                        <h5 class="text-bold text-uppercase mt-2">Payment Method <i class="fas fa-money-check-alt"></i>
                        </h5>
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
                                        <input class="form-check-input" type="radio" id="inlineRadio2" value="2"
                                            onclick="bdo()" name="payment_method">
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
                                    Account Number: 007070000771
                                </div>
                                <div id="gcashDiv" style="display: none">
                                    <hr>
                                    GCash Number: 09778267422
                                </div>
                                @endif
                            </div>
                        </div>
                        <h5 class="text-bold text-uppercase mt-2">Delivery Options <i class="fas fa-truck"></i></h5>
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
                                <div class="form-group row">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" class="custom-control-input" checked
                                            name="delivery_options" value="1">
                                        <label class="custom-control-label" for="customRadioInline2"><i
                                                class="fas fa-home"></i>
                                            Home Delivery </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" class="custom-control-input"
                                            name="delivery_options" value="2">
                                        <label class="custom-control-label" for="customRadioInline1"><i
                                                class="fas fa-store-alt"></i> Pick up from Store </label>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <h5 class="text-bold text-uppercase mt-2">Comments <i class="fas fa-comment-alt"></i></h5>
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
                                <textarea class="form-control" name="comments" placeholder="Comment here"
                                    type="text"></textarea>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-8">
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="text-bold text-uppercase">Products <i class="fas fa-box-open"></i></h5>
                            </div>
                            <div class="d-xl-none d-lg-none d-md-none justify-content-end"> <small
                                    class="text-success"><i class="fas fa-info-circle"></i> Scroll for more
                                    products</small> </div>
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


                            @foreach ($products as $productView)
                            <div class="col-lg-4 col-sm-12 col-md-12">
                                <div class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="card-title text-bold text-dark">
                                                        {{$productView->products}}</h5>
                                                </div>
                                                @if ($productView->stocks != '0')
                                                <div>
                                                    {{$productView->price}}/<small>{{$productView->unit}}</small></div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p><small>{{$productView->description}}</small></p>
                                                </div>
                                            </div>

                                            @if ($productView->stocks === '0')
                                            <div class="alert alert-danger text-center text-bold" role="alert">
                                                {{$productView->products}} is Out of Stock!
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <div class="label" for="Quantity">Quantity</div>
                                                <input class="form-control" type="number" name="quantity[]" min="0"
                                                    max="20" value="0" required>
                                            </div>

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
                            </div>
                            @endforeach
                            @endif






                        </div>
                    </div>



                </div>




            </div>


            @endif


        </form>

    </div>
</div>

<style>
    #scroller {

        height: 500px;
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
