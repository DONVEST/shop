<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .invoice-container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #333;
            font-size: 36px;
            margin: 0;
        }
        .header p {
            color: #666;
            font-size: 18px;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-details div {
            width: 45%;
        }
        table{
            text-align: center;
            align-items: center;  
        }
        .invoice-details div h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .invoice-details div p {
            color: #555;
            font-size: 16px;
        }
        .order-summary {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .order-summary th, .order-summary td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .order-summary th {
            background-color: #2c3e50;
            color: #fff;
        }
        .order-summary td {
            background-color: #f9f9f9;
        }
        .status {
            color: #fff;
            padding: 8px;
            font-weight: bold;
            border-radius: 5px;
        }
        .status.pending {
            background-color: #f39c12;
        }
        .status.completed {
            background-color: #27ae60;
        }
        .status.cancelled {
            background-color: #e74c3c;
        }
        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .pending{
            padding: 7px 10px;
            color: #fff;
            background-color: #c73030;
            box-shadow: unset 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 100px;
        }
        .processing{
            padding: 7px 10px;
            color: #fff;
            background-color: #44b222;
            box-shadow: unset 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .completed{
            padding: 7px 10px;
            color: #fff;
            background-color: #112e8d;
            box-shadow: unset 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        table img{
            display: block;
            margin: 1px auto;
            width: 150px;
            height: 100px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <div class="header">
            <h1>Invoice SHP_{{$order->id}}</h1>
            <p>Thank you for your purchase!</p>
        </div>

        <div class="invoice-details">
            <div>
                <h3>Customer Details</h3>
                <p><strong>Name:</strong> {{$order->user->name}}</p>
                <p><strong>Address:</strong> {{$order->address}}</p>
                <p><strong>Phone:</strong> {{$order->phone}}</p>
            </div>
            <div>
                <h3>Order Information</h3>
                <p><strong>Order ID:</strong> SHP_{{$order->id}}</p>
                <p><strong>Status:</strong>
                    @if ($order->status === 'pending')
                          <span class="pending">{{$order->status}}</span>
                          @elseif ($order->status === 'processing')
                          <span class="processing">{{$order->status}}</span>
                          @elseif ($order->status === 'completed')
                          <span class="completed">{{$order->status}}</span>
                    @endif
                </p>
                <p><strong>Order Date:</strong> {{$order->created_at}}</p>
            </div>
        </div>

        <table class="order-summary">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><img src="{{public_path("images/products/$path")}}" alt="" width="200" height="200"></td>
                    <td>{{$order->product->title}}</td>
                    <td>N{{number_format($order->product->price)}}</td>
                    <td>
                        @if ($order->status === 'pending')
                          <span class="pending">{{$order->status}}</span>
                          @elseif ($order->status === 'processing')
                          <span class="processing">{{$order->status}}</span>
                          @elseif ($order->status === 'completed')
                          <span class="completed">{{$order->status}}</span>
                    @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; 2024 Your Company Name | All Rights Reserved</p>
        </div>
    </div>

</body>
</html>
