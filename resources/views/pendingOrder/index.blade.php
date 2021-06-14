@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Pending Orders <i class="fas fa-business-time text-danger"></i></h2>
    </div>
    <div>

        <a class="btn btn-success" href="{{ route('confirmed_order.index') }}"> Confirmed Orders <i
                class="fas fa-calendar-check"></i></a>

    </div>
</div>

<hr>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif




<div class="row">
    <div class="col-lg-12 table-responsive-sm">
        <table class="table table-hover table-bordered" id="pendingOrder">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 10%;">Order #</th>
                    <th class="bg-primary text-center">View</th>
                    <th>Customer Name</th>
                    <th>Orders</th>
                    <th>Quantity</th>
                    <th>Payment Method / Delivery Option</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $ordersView)
                <tr>
                    <td class="text-center">{{$ordersView->id}}</td>
                    <td class="table-primary text-center">
                        <span data-toggle="tooltip" data-placement="top" title="View Information">
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#a{{$ordersView->id}}" aria-expanded="false"
                                aria-controls="collapseExample">
                                <i class="fas fa-eye"></i>
                            </button>
                        </span>

                        <div class="collapse" id="a{{$ordersView->id}}">
                            <div class="card card-body text-dark">
                                <p>Email: {{$ordersView->email}}</p>
                                @if ($ordersView->phone_number === '0')
                                <p>Phone Number: None</p>
                                @else
                                <p>Phone Number: {{$ordersView->phone_number}}</p>
                                @endif

                                <p>Address: {{$ordersView->street_address}}</p>
                                <p>Comments: {{$ordersView->comments}}</p>

                            </div>
                        </div>

                    </td>
                    <td>
                        {{$ordersView->full_name}}


                    </td>
                    <td>

                        @foreach ($orderList as $orderListView)
                        @if($ordersView->id === $orderListView->order_id)

                        <li style="list-style-type:none">{{$orderListView->product_name, $ordersView->product_id}}</li>

                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($orderList as $orderListView)
                        @if($ordersView->id === $orderListView->order_id)
                        <li style="list-style-type:none">{{$orderListView->quantity}} /{{$orderListView->product_unit}}
                        </li>
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <div class="row">
                            <div class="col">
                                @if($ordersView->payment_method === 1)
                                <span class="d-block badge badge-pill badge-primary">Cash on Delivery</span>
                                @elseif($ordersView->payment_method === 2)
                                <span class="d-block badge badge-pill badge-primary">BDO</span>
                                @elseif($ordersView->payment_method === 3)
                                <span class="d-block badge badge-pill badge-primary">GCash</span>
                                @endif</div>
                            <div class="col">
                                @if($ordersView->delivery_options === 1)
                                <span class="d-block badge badge-pill badge-info">Home Delivery <i
                                        class="fas fa-home"></i></span>
                                @elseif($ordersView->delivery_options === 2)
                                <span class="d-block  badge badge-pill badge-info">Pick up from Store <i
                                        class="fas fa-store-alt"></i></span>
                                @endif
                            </div>
                        </div>



                    </td>
                    <td>

                        <form action="{{ route('pending_order.destroy',$ordersView->id) }}" method="post">
                            <span data-toggle="tooltip" data-placement="left" title="View to confirm">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#b{{$ordersView->id}}"><i class="fas fa-search"></i></button>
                            </span>
                            @csrf
                            @method('DELETE')


                            <span data-toggle="tooltip" data-placement="left" title="Edit Order">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{$ordersView->id}}"><i class="fas fa-EDIT"></i></button>
                            </span>





                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                data-placement="left" title="Cancel Order"
                                onclick="return confirm('Are you sure you want to delete?')"><i
                                    class="fas fa-trash-alt"></i></button>

                        </form>

                        <!-- Viewing of Order -->
                        <div class="modal fade" id="b{{$ordersView->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$ordersView->full_name}}</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <h5 class="text-uppercase text-bold border-bottom border-dark">Order Number
                                            #{{$ordersView->id}}</h5>


                                        <h5>Order List <i class="fas fa-list-alt text-primary pt-2"></i></h5>


                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderList as $orderListView)

                                                @if($ordersView->id === $orderListView->order_id)
                                                <tr>
                                                    <td>
                                                        <li style="list-style-type:none">
                                                            {{$orderListView->product_name, $ordersView->product_id}}
                                                        </li>
                                                    </td>
                                                    <td>
                                                        <li style="list-style-type:none">
                                                            {{$orderListView->quantity}}
                                                            /{{$orderListView->product_unit}}
                                                        </li>
                                                    </td>
                                                    <td>
                                                        <li style="list-style-type:none">
                                                            {{$orderListView->priceOrder}}
                                                        </li>
                                                    </td>
                                                    <td>
                                                        {{$total = ($orderListView->quantity)*($orderListView->priceOrder)}}
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach

                                            </tbody>
                                            <tfoot>

                                                <tr>
                                                    <td colspan="3"
                                                        class="text-center text-uppercase text-bold text-dark">Grand
                                                        Total:</td>

                                                    <td>

                                                        @foreach ($totals as $grandTotal)
                                                        @if($ordersView->id === $grandTotal->order_id)
                                                        {{$grandTotal->total}}
                                                        @endif
                                                        @endforeach</td>
                                                </tr>

                                            </tfoot>


                                        </table>

                                        {!! Form::model($ordersView, ['method' => 'PATCH','route' =>
                                        ['pending_order.update', $ordersView->id]]) !!}

                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group">
                                            <label>Delivery Date</label>
                                            <input class="form-control" type="date" name="ship_date"
                                            required>
                                        </div>


                                        <div class="form-group">
                                            <label>Email Option</label>
                                            <select name="emailSend" class="form-control">
                                                <option value="1">Send</option>
                                                <option value="2">Do Not Send</option>
                                            </select>
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                       

                                        <input name="order_status" value="2" hidden>

                                        <button type="submit" class="btn btn-success">Confirm Order <i
                                                class="fas fa-check-circle"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF VIEWING ORDER -->


                        <!-- EDITING ORDER -->



                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$ordersView->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$ordersView->full_name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <h5 class="text-uppercase text-bold border-bottom border-dark">Order Number
                                            #{{$ordersView->id}}</h5>

                                        <div class="row">
                                            <div class="col-6">

                                                <form action="{{ route('pending_order_edit.update',$ordersView->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <h5 class="text-uppercase text-bold text-dark">Information</h5>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input class="form-control" name="full_name"
                                                            value="{{$ordersView->full_name}}" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email"
                                                            value="{{$ordersView->email}}" type="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input class="form-control" name="phone_number"
                                                            value="{{$ordersView->phone_number}}" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address Line</label>
                                                        <textarea class="form-control"
                                                            name="street_address">{{$ordersView->street_address}}</textarea>
                                                    </div>


                                            </div>
                                            <div class="col-6">

                                                <h5 class="text-uppercase text-bold text-dark">Payment & Delivery
                                                    Method</h5>
                                                <hr>

                                                <div class="form-group">
                                                    <label>Payment</label>
                                                    <select class="form-control" name="payment_method"
                                                        value="{{$ordersView->payment_method}}">
                                                        <option value="1">Cash on Delivery</option>
                                                        <option value="2">BDO</option>
                                                        <option value="3">GCash</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Delivery</label>
                                                    <select class="form-control" name="delivery_options"
                                                        value="{{$ordersView->delivery_options}}">
                                                        <option value="1">Home Delivery</option>
                                                        <option value="2">Pick up from Store</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Comments</label>
                                                    <textarea class="form-control"
                                                        name="comments">{{$ordersView->comments}}</textarea>
                                                </div>



                                            </div>
                                        </div>

                                        <h5 class="text-uppercase text-bold text-dark">Orders</h5>
                                        <hr>

                                        <div class="row">


                                            @foreach ($orderListEdit as $orderTable)
                                            @if($ordersView->id === $orderTable->order_id)
                                            <div class="col-6 mt-2">
                                                <div class="card p-2 border border-info">
                                                    <div class="form-group">
                                                        
                                                        <h5 class="border-bottom border-info text-dark">
                                                            {{$orderTable->product_name}}
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input class="form-control" value="{{$orderTable->quantity}}"
                                                            name="quantity[]">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input class="form-control" value="{{$orderTable->priceOrder}}"
                                                            name="priceOrder[]">
                                                    </div>

                                                    <div class="form-group d-none">
                                                        <label>Product ID</label>
                                                        <input class="form-control" value="{{$orderTable->product_id}}"
                                                            name="product_id[]">
                                                    </div>

                                                    <div class="form-group d-none">
                                                        <label>Order List ID</label>
                                                        <input class="form-control" value="{{$orderTable->id}}"
                                                            name="order_lists_id[]">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>





                        <!-- END OF EDITING ORDER -->

                        








                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>







@endsection
