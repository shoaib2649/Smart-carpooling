<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('boot/bootstrap.css')}}">
  <title>Document</title>
</head>
<body>
  <div style="margin-top:100px;text-align:center;">
    <h2>Update Products</h2>
  </div>
  <div>
    @if(Session()->has('message'))
      <div class="alert alert-success">{{Session()->get('message')}}</div>
      @endif
      </div>

  
      <div  class="container-fluid ">
        <div class="row ">


            <div class="col-md-6 col-md-offset-3 border border-primary">
<form action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data" >
    @csrf 
    <input type="hidden" class="form-control  textcolor" value="{{$products->id}}" id="id"  name="id">

<div>
     <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control  textcolor" value="{{$products->title}}" id="title"  name="title">

</div>
<div>
     <label for="description" class="form-label">Description</label>
    <input type="text"  value="{{$products->description}}" class="form-control  textcolor" id="description"  name="description">
</div>

<div>
     <label for="quantity" class="form-label">quantity</label>
    <input type="number" class="form-control textcolor" value="{{$products->quantity}}" id="quantity"  name="quantity">
</div>


<div>
     <label for="price" class="form-label">price</label>
    <input type="number" value="{{$products->price}}" class="form-control textcolor" id="price"  name="price">
</div>
<div>
     <label for="discountprice" class="form-label">discount price</label>
    <input type="number" value="{{$products->discountprice}}" class="form-control textcolor" id="discountprice"  name="discountprice">
</div>
<div>
 
</div>

<div>
    <label for="file" class="form-label">Image upload</label>
    <input type="file" class="form-control textcolor" id="file"  name="image">
   
   <div>
  <select name="category" id="">
    @foreach($categories as $category)
  <option value="{{$category->category}}" class="textcolor">{{$category->category}}</option>
    @endforeach
  </select>
</div>
  
   
    <img src="{{ asset('product/' . $products->image) }}" width="100px" height="100px" alt="ddd">


</div>

<div>
    <button class="btn btn-primary " type="submit">Add category</button>
     </div>
   </form>
</div>
</div>
</div>
    </div>    
</body>
</html>