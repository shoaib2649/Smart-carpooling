<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Document</title>
</head>
<body>

   <div>
      <h1>Oder Detail</h1> 
        <h1>CartId</h1>
        <h3>{{$order->id}}</h3>
        <h1>Email</h1>
        <h3>{{$order->email}}</h3>
        <h1>Phone</h1>
        <h3>{{$order->phone}}</h3>
        <h1>Address</h1>
        <h3>{{$order->address}}</h3>
        <h1>Product Title</h1>
        <h3>{{$order->product_title}}</h3>
        <h1>Price</h1>
        <h3>{{$order->price}}</h3>
        <h1>Quantity</h1>
        <h3>{{$order->quantity}}</h3>
        <h1>User Id</h1>
        <h3>{{$order->user_id}}</h3>
        
        
        <h1>Image</h1>
        <img src="{{'product/' . $order->image}}"  width="250px" height="300px" alt="">
    </div>  
</body>
</html>
