<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title>Document</title>
</head>
<body>
 <h2 style="text-align:center; margin-top: 100px; ">Show Listening</h2>
	<div class="container" style="margin-top:100px">
		<table class="table table-bordered table-dark">
			@if(Session()->has('message'))
			<div class="alert alert-success">{{Session()->get('message')}}</div>
			@endif
  <thead class="table-dark">

    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Title</th>
      <th scope="col">Description </th>
      <th scope="col">Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Category</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th colspan="3" style="text-align:center">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($products as $product)
    <tr>
      <td scope="row">{{$product->id}}</td>
      <td scope="row">{{$product->title}}</td>
      <td scope="row">{{$product->description}}</td>
      <td scope="row">{{$product->price}}</td>
      <td scope="row">{{$product->discountprice}}</td>
      <td scope="row">{{$product->category}}</td>
      <td scope="row">{{$product->quantity}}</td>
    <td><img src="{{'product/'.$product->image}}" width="100px" height="100px" alt=""></td>

      <td><a href="{{'deleteproduct/'.$product->id}}" class="btn btn-danger">Delete</a></td>
      <td><a href="{{'editproduct/'.$product->id}}" class="btn btn-primary">Edit</a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>
	</div>
</body>
</html>