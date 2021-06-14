<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 2</title>

    <style>
        @font-face {
            font-family: Arial;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 100%;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
           
            text-align: right;
        }


        #details {
            margin-bottom: 20px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #7BD33F;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            
            text-align: right;
        }

        #invoice h1 {
            color: #7BD33F;
            font-size: 1.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #0087C3;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
           
        }

        table tfoot td {
            padding: 5px 4px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.0em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #0087C3;
            font-size: 1.4em;
            border-top: 1px solid #0087C3;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 1.5em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #7BD33F;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

    </style>

</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="image/logo.png">
        </div>
        <div id="company">
            <h2 class="name">mercancías</h2>
            <div>Lumiere Residences</div>
            <div><a href="https://8wayOnline.me">mercancías.me</a></div>
            <div>09778267422 (Globe) or 09288646393 (Smart).</div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">{{$table->full_name}}</h2>
                <div class="address">{{$table->street_address}}</div>
                <div class="email"><a href="mailto:john@example.com">{{$table->email}}</a></div>
            </div>
            <div id="invoice">
                <h1>INVOICE {{$table->id}}</h1>
                <div class="date">Date of Invoice: {{date('M d,Y', strtotime($table->created_at))}}</div>
                <div class="date">Delivery Date: {{date('M d,Y', strtotime($table->ship_date))}}</div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="desc">PRODUCT</th>
                    <th class="unit">QUANTITY</th>
                    <th class="qty">PRICE</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderList as $orderListView)
                <tr>
                    <td class="desc">
                        {{$orderListView->product_name}}
                    </td>
                    <td class="unit">{{$orderListView->quantity}} {{$orderListView->product_unit}}</td>
                    <td class="qty">{{$orderListView->priceOrder}}</td>
                    <td class="total">{{$total = ($orderListView->quantity)*($orderListView->priceOrder)}}</td>
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

        <div id="thanks">Thank you for ordering at mercancías!</div>

        
        @if ($table->payment_method === 1)
        <div id="notices">
            <div>Notice:</div>
            <div class="notice">Please prepare an exact amount to facilitate faster transaction. Thank you! </div>
            <br>
            <div class="notice">Orders will be delivered right at your doorstep!</div>
            <br>
            <div class="notice">Thank you for your continued support!</div>
        </div>
        @elseif($table->payment_method === 2)
        <div id="notices">
            <div>Notice:</div>
            <div class="notice">BDO Account Number: 007070000771</div>
            <br>
            <div class="notice">If settling payments thru BDO, kindly send us a screenshot of your payment via messenger for proper tagging</div>
            <br>
            <div class="notice">Orders will be delivered right at your doorstep!</div>
            <br>
            <div class="notice">Thank you for your continued support!</div>
        </div>
        @elseif($table->payment_method === 3)
  

        <div id="notices">
            <div>Notice:</div>
            <div class="notice">GCash Number: 09778267422</div>
            <br>
            <div class="notice">If settling payments thru Gcash, kindly send us a screenshot of your payment via messenger for proper tagging</div>
            <br>
            <div class="notice">Orders will be delivered right at your doorstep!</div>
            <br>
            <div class="notice">Thank you for your continued support!</div>
        </div>
        @endif

        
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
