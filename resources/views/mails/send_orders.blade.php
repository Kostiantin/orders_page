<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>

Hello <i>{{ $data->receiver }}</i>,
<p>This is orders report. Date: {{date('Y-m-d')}}</p>

<table cellpadding="5" cellspacing="0" border="1">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Client</th>
        <th>Product</th>
        <th>Total</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($data->orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->client_name}}</td>
                <td>{{$order->product_name}}</td>
                <td>$ {{$order->total_amount}}</td>
                <td>{{$order->order_date}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br/>
Many thanks,
<br/>
<i>{{ $data->sender }}</i>
</body>
</html>

