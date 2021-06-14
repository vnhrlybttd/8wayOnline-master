@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Deliveries <i class="fas fa-truck text-primary"></i></h2>
    </div>
    <div>

        {{-- <a class="btn btn-success" href="{{ route('products.create') }}"> New Product <i
            class="fas fa-plus-circle"></i></> --}}

    </div>
</div>

<hr>

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="row">
    <div class="col-lg-12 table-responsive-sm">
        <table class="table table-hover table-bordered" id="delivery">
            <thead class="table-dark">
                <tr>
                    <th width="1%">Order Number</th>
                    <th>Client Name</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Delivery Method</th>
                    <th>Date Ordered</th>
                    <th>Delivery Status</th>
                    <th>Delivery Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveryTable as $deliveryView)
                <tr>
                    <td>{{$deliveryView->id}}</td>
                    <td>{{$deliveryView->full_name}}</td>
                    <td>


                        <div class="col">
                            @if($deliveryView->payment_method === 1)
                            <span class="d-block badge badge-pill badge-primary">Cash on Delivery</span>
                            @elseif($deliveryView->payment_method === 2)
                            <span class="d-block badge badge-pill badge-primary">BDO</span>
                            @elseif($deliveryView->payment_method === 3)
                            <span class="d-block badge badge-pill badge-primary">GCash</span>
                            @endif</div>



                    </td>
                    <td>

                        <div class="col">
                            @if($deliveryView->payment_status === 1)
                            <span class="d-block badge badge-pill badge-danger">Not Paid </span>
                            @elseif($deliveryView->payment_status === 2)
                            <span class="d-block  badge badge-pill badge-success">Paid</span>
                            @endif
                        </div>

                    </td>
                    <td>

                        <div class="col">
                            @if($deliveryView->delivery_options === 1)
                            <span class="d-block badge badge-pill badge-primary">Home Delivery <i
                                    class="fas fa-home"></i></span>
                            @elseif($deliveryView->delivery_options === 2)
                            <span class="d-block  badge badge-pill badge-primary">Pick up from Store <i
                                    class="fas fa-store-alt"></i></span>
                            @endif
                        </div>

                    </td>

                    <td class="text-center">
                        {{date('M d,Y', strtotime($deliveryView->created_at))}}
                    </td>

                    <td class="bg-dark">

                        @if($deliveryView->delivery_options === 1)
                        <div class="col text-center text-bold text-uppercase">
                            @if($deliveryView->delivery_status === 1)
                            <small class="text-warning">Pending
                            </small>
                            @elseif($deliveryView->delivery_status === 2)
                            <small class="text-info">Shipped
                            </small>
                            @elseif($deliveryView->delivery_status === 3)
                            <small class="text-success">Delivered
                            </small>
                            @elseif($deliveryView->delivery_status === 4)
                            <small class="text-secondary">On Hold
                            </small>
                            @elseif($deliveryView->delivery_status === 5)
                            <small class="text-danger">Delivery Failed
                            </small>
                            @endif
                        </div>
                        @elseif($deliveryView->delivery_options === 2)
                        <div class="col text-center text-bold text-uppercase">
                            @if($deliveryView->delivery_status === 6)
                            <small class="text-warning">For Pick Up
                            </small>
                            @elseif($deliveryView->delivery_status === 7)
                            <small class="text-success">Success
                            </small>
                            @elseif($deliveryView->delivery_status === 8)
                            <small class="text-info">On Hold
                            </small>
                            @elseif($deliveryView->delivery_status === 9)
                            <small class="text-danger">Pick Up Failed
                            </small>
                            @elseif($deliveryView->delivery_status === 10)
                            <small class="text-secondary">Re-Scheduled
                            </small>
                            @endif
                        </div>
                        @endif

                    </td>

                    


                    <td class="text-center">


                        @if (is_null($deliveryView->ship_date))
                        <p class="text-danger">Please Set a Date</p>
                        @else
                        {{date('M d,Y', strtotime($deliveryView->ship_date))}}
                        @endif
                    </td>



                    <td>
                        <div class="d-flex">

                            <div class="col">
                                <span data-toggle="tooltip" data-placement="left" title="Change Date">
                                    <!-- Button for Date -->
                                    <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal"
                                        data-target="#date{{$deliveryView->id}}">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                </span>

                                <!-- Modal for Date -->
                                <div class="modal fade" id="date{{$deliveryView->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{$deliveryView->full_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('deliveryDate.update',$deliveryView->id) }}"
                                                    method="POST"
                                                    onSubmit="document.getElementById('submit').disabled=true;">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label>Delivery Date</label>
                                                        <input class="form-control" type="date" name="ship_date"
                                                            required value="{{$deliveryView->ship_date}}">
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
                            </div>





                        </div>





                        <div class="col">
                            <span data-toggle="tooltip" data-placement="left" title="Edit Delivery Status">
                                <!-- Button for Status -->
                                <button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal"
                                    data-target="#delivery{{$deliveryView->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </span>



                            <!-- Modal for Status -->
                            <div class="modal fade" id="delivery{{$deliveryView->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{$deliveryView->full_name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('delivery.update',$deliveryView->id) }}"
                                                method="POST"
                                                onSubmit="document.getElementById('submit').disabled=true;">
                                                @csrf
                                                @method('PUT')
                                                @if($deliveryView->delivery_options === 1 )
                                                <div class="form-group">
                                                    <label>Delivery Status</label>

                                                    <select class="form-control" name="delivery_status"
                                                        value="{{$deliveryView->delivery_status}}">
                                                        <option value="1">Pending...</option>
                                                        <option value="2">Shipped</option>
                                                        <option value="3">Delivered</option>
                                                        <option value="4">On Hold</option>
                                                        <option value="5">Delivery Failed</option>
                                                    </select>
                                                </div>
                                                @elseif($deliveryView->delivery_options === 2)

                                                <div class="form-group">
                                                    <label>Delivery Status</label>
                                                    <select class="form-control" name="delivery_status"
                                                        value="{{$deliveryView->delivery_status}}">
                                                        <option value="6">For Pick Up</option>
                                                        <option value="7">Success</option>
                                                        <option value="8">On Hold</option>
                                                        <option value="9">Pick Up Failed</option>
                                                        <option value="10">Re-Scheduled</option>
                                                    </select>
                                                </div>

                                                @endif

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="submit">Save
                                                changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>







    </div>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
</div>



@endsection
