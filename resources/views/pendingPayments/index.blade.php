@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Pending Payments <i class="fas fa-exclamation text-danger"></i></h2>
    </div>
    <div>

        <a class="btn btn-success" href="{{ route('confirmed_payments.index') }}"> Confirmed Payments <i
            class="fas fa-money-check"></i></a>

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
                    <th>Order Number</th>
                    <th>Client Name</th>
                    <th>Payment Method</th>
                    <th>Total Amount Ordered</th>
                    <th>Date Ordered</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $paymentsView)
                <tr>
                    <td>#{{$paymentsView->order_number_link}}</td>
                    <td>{{$paymentsView->full_name}}</td>
                    <td>
                        @if($paymentsView->payment_method === 1)
                        <span class="d-block badge badge-pill badge-primary">Cash on Delivery</span>
                        @elseif($paymentsView->payment_method === 2)
                        <span class="d-block badge badge-pill badge-primary">BDO</span>
                        @elseif($paymentsView->payment_method === 3)
                        <span class="d-block badge badge-pill badge-primary">GCash</span>
                        @endif
                    </td>
                    <td>

                        @foreach ($totals as $grandTotal)
                        @if ($paymentsView->order_number_link === $grandTotal->order_id)
                            {{$grandTotal->total}}
                        @endif
                        @endforeach
                      
                    </td>
                <td>{{date('M d,Y', strtotime($paymentsView->ship_date))}}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <span data-toggle="tooltip"
                        data-placement="left" title="Confirm Payment">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#c{{$paymentsView->order_number_link}}">
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </span>
                        <!-- Modal -->
                        <div class="modal fade" id="c{{$paymentsView->order_number_link}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$paymentsView->full_name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($paymentsView, ['method' => 'PATCH','route' => ['pending_payments.update', $paymentsView->order_number_link]]) !!}
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                        <h5 class="text-uppercase text-bold border-bottom border-dark">Order Number #{{$paymentsView->order_number_link}}</h5>
                                        <hr>
                                        <div class="form-group">
                                            <label>Total Amount Ordered</label>

                                            @foreach ($totals as $grandTotal)
                                            @if ($paymentsView->order_number_link === $grandTotal->order_id)
                                            <input class="form-control" value="{{$grandTotal->total}}" readonly="readonly" name="total_amount_ordered">
                                            @endif
                                            @endforeach
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Amount Paid</label>
                                            @foreach ($totals as $grandTotal)
                                            @if ($paymentsView->order_number_link === $grandTotal->order_id)
                                            <input type="number" class="form-control" name="amount" required placeholder="0" value="{{$grandTotal->total}}">
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label>Date Paid</label>
                                            <input type="date" class="form-control" name="date_paid" required>
                                        </div>
                                        <input name="payment_status" value="2" hidden>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" type="submit" class="btn btn-success">Confirm</button>
                                    </div>
                                    {!! Form::close() !!}
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
