 <!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="{{asset('boot/bootstrap.css')}}">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>
	<div class="mt-4">
		 @if(Session()->has('message'))
      <div class="alert alert-success">
        {{Session()->get('message')}}
      </div>
      @endif
		<h1 class="text-center pt-5">Add Category</h1>
			</div>
			<form action="{{route('addcategory')}}" method="POST">
				@csrf
		<div class="container">

			<div class="row offset-md-3">
				<div class="col-md-4">
					
    <label for="Category" class="form-label ">Add category</label>
    <input type="text" class="form-control " style="margin-bottom:16px" id="category"  name="category">
    <button class="btn btn-primary " type="submit">Add category</button>
  </div>
				</div>
			</div>
			</form>
			<!-- This is for display data -->
			<h2 class="text-center">Listening of <span style="color:blue;text-shadow: inherit;font-size: 45px;">Category</span></h2>
	
	<div class="container" >
		<div class="row" class="offset-lg-5">

<div class=" col-md-8" style="border:3px solid blue;">
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">CategoryName</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  	@foreach($categories as $category)
    <tr>
      <td>{{$category->id}}</td>
      <td>{{$category->category}}</td>
      <td> <a onclick="return confirm('Are you want to delete the category')" href="{{'deletecategory/'.$category->id}}" class="btn btn-danger ">Delete</a> </td>
      
    </tr>
    @endforeach
  </tbody>
</table>



</div>
		</div>
	</div>
	
</body>
</html>