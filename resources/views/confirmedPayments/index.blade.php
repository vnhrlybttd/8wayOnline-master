@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Confirmed Payments <i class="fas fa-money-check text-success"></i></h2>
    </div>
    <div>

        <a class="btn btn-danger" href="{{ route('pending_payments.index') }}"> Pending Payments <i
            class="fas fa-exclamation"></i></a>

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
                    <th>Ordered Date/Time</th>
                    <th>Amount Paid</th>
                    
                </tr>
            </thead>
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
            <td>{{$paymentsView->created_at}}</td>
            <td>{{$paymentsView->amount}}</td>
                
            </tr>
            @endforeach
        </table>

    </div>
</div>

@endsection
