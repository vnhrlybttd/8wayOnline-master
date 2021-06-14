<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 100%;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: left;
            width: 55px;
            margin-right: 35px;
            display: inline-block;
            font-size: 1em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
            font-size: 1em;
        }



        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

    </style>

</head>

<body>
    <header class="clearfix">
        {{-- <div id="logo">
            <img src="logo.png">
        </div> --}}
        <h1>8wayOnline</h1>
        {{-- <div id="company" class="clearfix">
            <div>Company Name</div>
            <div>455 Foggy Heights,<br /> AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div>
        </div> --}}
        <div>


        </div>
    </header>

    <main>

        <table style="width: 100%;" >
            <tbody>
                <tr>
                    <td>Invoice # {{$table->id}}</td>
                </tr>
                <tr>
                    <td>Delivery Date: {{date('M d,Y', strtotime($table->ship_date))}}</td>
                </tr>
                <tr>
                    <td>Name: {{$table->full_name}}</td>
                </tr>
                <tr>
                    <td>Email: {{$table->email}}</td>
                </tr>
                <tr>
                    <td>Address: {{$table->street_address}}</td>
                </tr>
                <tr>
                    <td>

                        @if ($table->payment_method === 1)
                        Payment Method: Cash on Delivery
                        @elseif($table->payment_method === 2)
                        Payment Method: BDO, Account Number: 007070000771
                        @elseif($table->payment_method === 3)
                        Payment Method: GCASH, GCash Number: 09778267422
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>

                        @if ($table->delivery_options === 1)
                        Delivery Method: Home Delivery
                        @elseif($table->delivery_options === 2)
                        Delivery Method: Pick up from Store
                        @endif

                    </td>
                </tr>
            </tbody>
        </table>


        <table class="table table-bordered mt-2">
            <thead>
                <tr class="text-center">
                    <th>PRODUCT</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderList as $orderListView)
                <tr class="text-center">
                    <td class="service">{{$orderListView->product_name}}</td>
                    <td class="service">{{$orderListView->quantity}}/{{$orderListView->product_unit}}</td>
                    <td class="service">{{$orderListView->priceOrder}}</td>
                    <td class="service"> {{$total = ($orderListView->quantity)*($orderListView->priceOrder)}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-center text-bold"> GRAND TOTAL</td>
                    <td class="text-center">
                        @foreach ($totals as $grandTotal)

                        {{$grandTotal->total}}

                        @endforeach</td>
                    </td>
                </tr>
            </tfoot>
        </table>
        {{--  <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div> --}}
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
       {{--  Copyright © 8wayOnline 2020 --}}
    </footer>
</body>


</html>
