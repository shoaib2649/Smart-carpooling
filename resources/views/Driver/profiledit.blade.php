<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <style>
        .custom-container {
            border: 1px solid #dc3545; /* Red border color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); /* Shadow effect */
        }
    </style>
</head>
<body >

  <div class="container custom-container border border-danger mt-5 mb-5 p-5 w-50">
  
    <div class="row justify-content-center">
      <div class="col-md-8"> 
     <form action="{{ url('updateprofile/' . $driverId->id) }}"method="post" >
          @csrf
          <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text"  name="name" class="form-control " id="name" placeholder="Enter your name" value="{{$driverId->name}}">
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" name="email"class="form-control" id="email" placeholder="Enter your email" value="{{$driverId->email}}">
          </div>
          <div class="form-group mb-3">
            <label for="email">Phone</label>
            <input type="text" name="phone"class="form-control" id="email" placeholder="Enter your phone" value="{{$driverId->phone}}">
          </div>
          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" id="email" placeholder="Enter your password" value="{{$driverId->password}}">
          </div>
          <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control"  placeholder="Enter your Address" value="{{$driverId->address}}"></input>
          </div>
          <div class="form-group mb-3 ">
            <label for="District">District</label>
            <input type="text" name="district" class="form-control" placeholder="Enter the District" value="{{$driverId->district}}">
          </div> 
          <div class="form-group mb-3 d-flex justify-content-center ">
            
            <button type="submit" class="btn btn-success form-control rounded-pill btn-block w-75 ">Update</button>
          </div>      
 
        </form>
      </div>
    </div>
  </div>
</body>
</html>
