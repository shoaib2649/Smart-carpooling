<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
<div class="container-fluid mt-5 mb-5 p-5">
    <div class="row">
        <!-- First Section: Display Ride Details -->
        <div class="col-md-6">
        <h3 class="text-center text-primary mt-3 mb-3" >Ride Details</h3>
        <img src="{{ asset('Rideimages/' . $ride->ride_image) }}" alt="Ride Image" width="100%" height="40%">

        <div class="col-md-12 border border-gray-500">
           
            <table class="table">
  
  <tbody>
    
   
    <tr>
      <th scope="row">Name:</th>
      <td>{{ $ride->name }}</td>
    </tr>
    <tr>
      <th scope="row">Model:</th>
      <td>{{ $ride->model }}</td>
    </tr>
    <tr>
      <th scope="row">Number:</th>
      <td>{{ $ride->number }}</td>
    </tr>
    <tr>
      <th scope="row">Start Point:</th>
      <td>{{ $ride->startpoint }}</td>
    </tr>
    <tr>
      <th scope="row">End Point:</th>
      <td>{{ $ride->endpoint }}</td>
    </tr>
    <tr>
      <th scope="row">Fare:</th>
      <td>{{ $ride->fare }}</td>
    </tr>
    
   
  </tbody>
</table>

        </div>
        </div>
        
        <!-- Second Section: Ride Booking Form -->
        <div class="col-md-6">
        @if($errors->any())
        <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger"> {{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif
            <h2 class="text-center text-primary mt-3 mb-3">Ride Booking</h2>
            <form action="{{ route('rides.booking.store') }}" method="POST">
    @csrf <!-- CSRF Token -->
    
    <input type="hidden"  class="form-control" id="name" name="ride_id" required value="{{ $ride->id }}" >

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" placeholder="Enter the name" class="form-control" id="name" name="name" required>
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" placeholder="Enter the email" class="form-control" id="email" name="email" required>
    </div>

    <!-- Phone Number -->
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="number"  placeholder="Enter the phone number" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="row">
        <!-- Arrival -->
        <div class="col-md-6">
        <div class="form-group">
        <label for="arrival">Arrival Date:</label>
        <input type="date"  placeholder="Enter the arrival" class="form-control" id="arrival" name="arrival" required>
    </div>
        </div>
        <div class="col-md-6">

            <!-- Destination -->
            <div class="form-group">
                <label for="destination">Departure Date:</label>
                <input type="date" placeholder="Enter the destination" class="form-control" id="departure" name="departure" required>
            </div>
        </div>
        <!-- Destination -->
<div class="form-group col-md-12">
    <label for="driver_select">Select Driver</label>
   
    <select class="form-control" id="driver_select" name="driver_id" required> 
         @foreach ( $driver as $drivers )
        <option value="{{ $drivers->id }}" >{{  $drivers->name}}</option>   
        @endforeach
    </select>
     
</div>

    </div>
    

    <!-- Submit Button -->
    <div class="d-flex justify-content-center mt-5 mb-5">
    <button type="submit" class="btn btn-success rounded-pill w-75 p-2">Book Ride</button>
</div>
  
</form>            
        </div>
    </div>
</div>


</body>
</html>