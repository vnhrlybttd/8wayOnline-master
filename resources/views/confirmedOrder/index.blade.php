@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Confirmed Orders <i class="fas fa-clipboard-check text-success"></i></h2>
    </div>
    <div>

        <a class="btn btn-danger" href="{{ route('pending_order.index') }}"> Pending Orders <i
                class="fas fa-business-time"></i></a>

    </div>
</div>

<hr>



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
                                <p>Phone Number: {{$ordersView->phone_number}}</p>
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
                        <form action="{{ route('pending_order_edit.destroy',$ordersView->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('invoice.pdf',$ordersView->id)}}" class="btn btn-success btn-sm"
                                data-toggle="tooltip" data-placement="left" title="Invoice PDF"><i
                                    class="fas fa-file-pdf"></i></a>

                            @if ($ordersView->payment_status === 2)

                            @else

                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                data-placement="left" title="Delete Order"
                                onclick="return confirm('Are you sure you want to delete?')"><i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                        {!! Form::model($ordersView, ['method' => 'PATCH','route' =>
                        ['confirmed_order.update', $ordersView->id]]) !!}

                        @csrf
                        {{ method_field('PUT') }}

                        <input name="order_status" value="1" hidden>
                        


                        <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" type="submit"
                            title="Make Pending"
                            onclick="return confirm('Are you sure you want to make it pending order?')"><i
                                class="fas fa-folder-minus"></i></button>
                        {!! Form::close() !!}

                        @endif





                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



    </div>
</div>




@endsection
