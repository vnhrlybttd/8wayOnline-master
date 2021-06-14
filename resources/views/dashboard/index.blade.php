@extends('layouts.app')

@section('content')

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Dashboard</h3>{{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
        href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a> --}}
</div>
<div class="row">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                            <span>Total Earnings
                            </span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span> <span>&#8369;</span>
                                {{$totalEarnings}}</span></div>
                    </div>
                    <div class="col-auto"> <span class="fa-2x text-gray-300">&#8369;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                            <span>Completed Orders (paid)</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{$completedOrders}}</span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-clipboard-check fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-warning py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                            <span>Pending Orders</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{$pendingOrders}}</span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-info py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                            <span>Pending Payments</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3">
                                    <span>{{$pendingPayments}}</span></div>
                            </div>
                            <div class="col">
                                {{--  <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        <span class="sr-only">50%</span></div>
                                        
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<hr>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Deliveries</h3>{{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
        href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a> --}}
</div>

<div class="row">


    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                            <span>Total Delivered</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3">
                                    <span>{{$totalDelivered}}</span></div>
                            </div>
                            <div class="col">
                                {{--  <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        <span class="sr-only">50%</span></div>
                                        
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-truck-loading fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                            <span>Total Shipped</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3">
                                    <span>{{$totalShipped}}</span></div>
                            </div>
                            <div class="col">
                                {{--  <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        <span class="sr-only">50%</span></div>
                                        
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-truck fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-warning py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                            <span>Pending Delivery</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3">
                                    <span>{{$pendingDelivery}}</span></div>
                            </div>
                            <div class="col">
                                {{--  <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        <span class="sr-only">50%</span></div>
                                        
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-auto"><i class="fas fa-dolly fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">

    <div class="col-lg-6 table-responsive-sm p-2">

        <h5 class="text-uppercase text-primary text-bold border-bottom border-primary">Total Shipped <i class="fas fa-truck"></i></h5>

        <table class="table table-hover table-bordered" id="shipped">
            <thead class="table-primary">
                <th>Order Number</th>
                <th>Client Name</th>
                <th>Delivery Date</th>
            </thead>
            <tbody>
                @foreach ($shippedTable as $shippedView)
                <tr>
                    <td>{{$shippedView->id}}</td>
                    <td>{{$shippedView->full_name}}</td>
                    <td>
                        @if (is_null($shippedView->ship_date))
                        <p class="text-danger">Please Set a Date</p>
                        @else
                        {{date('M d,Y', strtotime($shippedView->ship_date))}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-lg-6 table-responsive-sm p-2">
        <h5 class="text-uppercase text-warning text-bold border-bottom border-warning">Pending Delivery <i class="fas fa-dolly"></i></h5>
        <table class="table table-hover table-bordered" id="pendingDelivery">
            <thead class="table-warning">
                <th>Order Number</th>
                <th>Client Name</th>
                <th>Delivery Date</th>
            </thead>
            <tbody>
                @foreach ($pendingTable as $pendingView)
                <tr>
                    <td>{{$pendingView->id}}</td>
                    <td>{{$pendingView->full_name}}</td>
                    <td>
                        @if (is_null($pendingView->ship_date))
                        <p class="text-danger">Please Set a Date</p>
                        @else
                        {{date('M d,Y', strtotime($pendingView->ship_date))}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>



</div>

<hr>

<div class="row">
    {{--  <div class="col-lg-7 col-xl-8">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Earnings Overview</h6>
                <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                        data-toggle="dropdown" aria-expanded="false" type="button"><i
                            class="fas fa-ellipsis-v text-gray-400"></i></button>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                        <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item"
                            role="presentation" href="#">&nbsp;Action</a><a class="dropdown-item" role="presentation"
                            href="#">&nbsp;Another
                            action</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation"
                            href="#">&nbsp;Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas
                    data-bs-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234,
    236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236,
    244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
</div>
</div>
</div>
</div> --}}
{{--  <div class="col-lg-5 col-xl-4">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Revenue Sources</h6>
                <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                        data-toggle="dropdown" aria-expanded="false" type="button"><i
                            class="fas fa-ellipsis-v text-gray-400"></i></button>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                        <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item"
                            role="presentation" href="#">&nbsp;Action</a><a class="dropdown-item" role="presentation"
                            href="#">&nbsp;Another
                            action</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation"
                            href="#">&nbsp;Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area"><canvas
                        data-bs-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{}}}"></canvas>
</div>
<div class="text-center small mt-4"><span class="mr-2"><i
            class="fas fa-circle text-primary"></i>&nbsp;Direct</span><span class="mr-2"><i
            class="fas fa-circle text-success"></i>&nbsp;Social</span><span class="mr-2"><i
            class="fas fa-circle text-info"></i>&nbsp;Refferal</span>
</div>
</div>
</div>
</div> --}}
</div>
{{-- <div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server migration<span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                        style="width: 20%;"><span class="sr-only">20%</span>
                    </div>
                </div>
                <h4 class="small font-weight-bold">Sales tracking<span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                        style="width: 40%;"><span class="sr-only">40%</span>
                    </div>
                </div>
                <h4 class="small font-weight-bold">Customer Database<span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                        style="width: 60%;"><span class="sr-only">60%</span>
                    </div>
                </div>
                <h4 class="small font-weight-bold">Payout Details<span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                        style="width: 80%;"><span class="sr-only">80%</span>
                    </div>
                </div>
                <h4 class="small font-weight-bold">Account setup<span class="float-right">Complete!</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                        style="width: 100%;"><span class="sr-only">100%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0">Todo List</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-checkbox"><input class="custom-control-input"
                                    type="checkbox" id="formCheck-1"><label class="custom-control-label"
                                    for="formCheck-1"></label></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">11:30 AM</span>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-checkbox"><input class="custom-control-input"
                                    type="checkbox" id="formCheck-2"><label class="custom-control-label"
                                    for="formCheck-2"></label></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">12:30 AM</span>
                        </div>
                        <div class="col-auto">
                            <div class="custom-control custom-checkbox"><input class="custom-control-input"
                                    type="checkbox" id="formCheck-3"><label class="custom-control-label"
                                    for="formCheck-3"></label></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card text-white bg-primary shadow">
                    <div class="card-body">
                        <p class="m-0">Primary</p>
                        <p class="text-white-50 small m-0">#4e73df</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card text-white bg-success shadow">
                    <div class="card-body">
                        <p class="m-0">Success</p>
                        <p class="text-white-50 small m-0">#1cc88a</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card text-white bg-info shadow">
                    <div class="card-body">
                        <p class="m-0">Info</p>
                        <p class="text-white-50 small m-0">#36b9cc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card text-white bg-warning shadow">
                    <div class="card-body">
                        <p class="m-0">Warning</p>
                        <p class="text-white-50 small m-0">#f6c23e</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card text-white bg-danger shadow">
                    <div class="card-body">
                        <p class="m-0">Danger</p>
                        <p class="text-white-50 small m-0">#e74a3b</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card text-white bg-secondary shadow">
                    <div class="card-body">
                        <p class="m-0">Secondary</p>
                        <p class="text-white-50 small m-0">#858796</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
