<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Bootstrap 5 Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  
</head>

<body>
  <section class="h-100">
    <div class="container h-400">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-7 col-xl-7 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
            <img src="{{asset('customfile/images/logo.png')}}" alt="logo" width="150" class="rounded-circle img-thumbnail">
          </div>
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <h1 class="fs-4 card-title fw-bold mb-4 text-center">Driver Register</h1>
  <form method="POST"  action="{{url('/driverregister')}}">
                 @csrf
                
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="firstname">DriverName</label>
                  <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                  
                </div> 
                

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" required>
                 
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="password">Password</label>
                  <input id="password" type="password" class="form-control" name="password" required> 
                </div> 
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="phone">Phone</label>
                  <input id="password" type="number" class="form-control" name="phone" required min = "11" max = "11">   
                @if($errors->has('phone'))

    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                </div>
                @endif
                  <div class="mb-3">
                  <label class="mb-2 text-muted" for="phone">Address</label>
                  <input id="address" type="text" class="form-control" name="address" required>   
                </div>

      
{{-- <div class="form-group">
               <p class="form-text text-muted mb-3">
                 Select Company
                </p>
            <select class="form-control mb-3" name="Agency_id" id="district" >
                @foreach($data as $data)
                    <option value="{{$data->id}}">{{$data->companyname}}</option>
                
              @endforeach
            </select>
        </div> --}}
        <div class="form-group">
               <p class="form-text text-muted mb-3">
                 Select District
                </p>
            <select class="form-control mb-3" name="district" id="district" >
                
                    <option value="Khushab">Khushab</option>
                    <option value="Miawali">Miawali</option>
                    <option value="Sargodha">Sargodha</option>
                    <option value="Lahore">Lahore</option>
              
            </select>
        </div>
        <input type="hidden" id="latitude" name="latitude" required >
       
        <div class="class ">
          <button onclick="getLocation(event)" class="btn btn-success">Share Location</button><br><br>
        </div>

         @if($errors->has('latitude'))
    <div class="error alert alert-danger">{{ $errors->first('latitude') }}</div>
@endif

        <input type="hidden" id="longitude" name="longitude" required>
         @if($errors->has('longitude'))
    <div class="alert alert-danger">{{ $errors->first('longitude') }}</div>
@endif
        <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary w-50 align-item-center rounded-pill">Register</button>
</div>
              </form>
            </div>
            <div class="card-footer py-3 border-0">
              <div class="text-center">
                Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </section>



  <script>
    function getLocation(event) {
        event.preventDefault();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }
</script>


</body>
</html>