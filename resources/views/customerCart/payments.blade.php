@extends('layouts.cart')
@section('content')



<form action="{{ action('CustomerController@checkout') }}" method="POST"
    onSubmit="document.getElementById('submit').disabled=true;">
    @csrf

<div class="d-flex justify-content-center mb-2 mt-3">
    <small class="text-muted text-uppercase">Order</small>
    <small>&nbsp; > &nbsp;</small>
    <small class="text-primary text-uppercase"> Payment</small>
</div>


<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8">

            <input name="order_status" value="1" hidden>
            <input name="invoice_status" value="1" hidden>
            <input name="payment_status" value="1" hidden>

            <h6 class="text-bold text-uppercase">Information <i class="fas fa-info-circle"></i></h6>
            <div class="card ">
                <div class="card-body shadow">




                    <div class="form-group">
                        <label for="name">Full Name </label>
                        <input class="form-control form-control-sm" name="full_name" placeholder="Ex. John Robert"
                            type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control form-control-sm" name="email" placeholder="Ex. johnrobert@gmail.com"
                            type="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Phone Number</label>
                        <input class="form-control form-control-sm" name="phone_number" placeholder="Ex. 0901XXXXXXXX"
                            type="text">
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


                </div>
            </div>
            <h6 class="text-bold text-uppercase mt-2">Payment Method <i class="fas fa-money-check-alt"></i></h6>
            <div class="card">
                <div class="card-body  shadow">


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
                            <input class="form-check-input" type="radio" id="inlineRadio3" value="3" onclick="gcash()"
                                name="payment_method">
                            <label class="form-check-label" for="inlineRadio3">GCASH</label>
                        </div>
                    </div>
                    <div id="bdoDiv" style="display: none">
                        <hr>
                        <p class="bg-info text-white p-2"><small><i class="fas fa-info-circle"></i> Do not forget to
                                copy the account number for your online payment</small></p>
                        <h6 class="text-bold text-uppercase text-center">Account Number: 007070000771</h6>
                        <h6 class="text-bold text-uppercase text-center">Account Name: Abegail Baja</h6>

                    </div>
                    <div id="gcashDiv" style="display: none">
                        <hr>
                        <p class="bg-info text-white p-2"><small><i class="fas fa-info-circle"></i> Do not forget to
                                copy the account number for your online payment</small></p>
                        <h6 class="text-bold text-uppercase text-center">GCash Number: 09778267422</h6>
                        <h6 class="text-bold text-uppercase text-center">GCash Name: Abegail Baja</h6>

                    </div>

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



                </div>
            </div>
            <h6 class="text-bold text-uppercase mt-2">Add a Note <i class="fas fa-comment-alt"></i></h6>
            <div class="card">
                <div class="card-body  shadow-lg">

                    <textarea class="form-control" name="comments" placeholder="Add a Note"></textarea>

                </div>
            </div>


        </div>

        <div class="col-lg-4">
            <h6 class="text-bold text-uppercase mt-2">Cart Contents <i class="fas fa-shopping-cart"></i></h6>
            <div class="card shadow">

                <div class="card-body">
                    @foreach ($session['product_name'] as $key => $orderView)
                    @if($session['quantity'][$key] != 0)
                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label>{{$orderView}}</label>
                            <p><small>({{$session['priceOrder'][$key]}} {{$session['product_unit'][$key]}})</small></p>
                        </div>
                        <div class="">
                            x {{$session['quantity'][$key]}}
                        </div>
                        
                        <input value="{{$session['product_id'][$key]}}" name="product_id[]" hidden>
                        <input value="{{$session['product_name'][$key]}}" name="product_name[]" hidden>
                        <input value="{{$session['priceOrder'][$key]}}" name="priceOrder[]" hidden>
                        <input value="{{$session['product_unit'][$key]}}" name="product_unit[]" hidden>
                        <input value="{{$session['quantity'][$key]}}" name="quantity[]" hidden>
                        
                    </div>

                    @endif
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-between mt-2">
                <div>
                    <h6 class="text-bold text-uppercase">Total <i class="fas fa-coins"></i></h6>
                </div>
                <div> <small class="text-info"><i class="fas fa-info-circle"></i> Delivery Fee not included</small>
                </div>


            </div>
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-center">&#8369; {{$average}}</h5>
                </div>
            </div>

            <button class="btn btn-success mt-2 btn-block text-uppercase" id="submit" type="submit"> <i class="fas fa-check"></i> Checkout</button>
            <a class="btn btn-primary mt-2 btn-block text-uppercase text-white" href="javascript:history.back()"> <i class="fas fa-arrow-left"></i> Go Back</a>
        </div>
    </div>

</form>

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
