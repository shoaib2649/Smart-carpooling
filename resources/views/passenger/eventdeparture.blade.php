<!-- resources/views/create_event_departure.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <style>
         body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, #ffffff, #f2f2f2); /* Gradient background */
        }

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top */
            min-height: 100vh; /* Minimum height of the container */
            padding: 50px 0; /* Add padding for better spacing */
        }
        .main-container{
            display: flex;
            flex-direction: columns;
            justify-content: center;
            align-items: center;
            /* border: 1px solid #000; */
            /* padding: 9px; */

        }
    input {
      width: 50px;
      padding: 2px;
      /* line-height: 24px; */
     
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 18px;
      /* text-align: center; */

     
    }
    button {
      background-color: #3498db;
      color: #fff;
      border: none;
      padding: 2px 12px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 18px;
      width: 70px;
    }

    #total{
        margin-top: 20px;
        font-size: 25px;
        color:blue;
        font-weight:12px;
    }
    .ticket-container h4{
        margin: 20px 10px;
    }
    </style>
     <title>Create Event Departure</title>
    
</head>
<body>
   
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif



<div class="container-fluid mt-5 ">
    <div class="row">
        <!-- Ticket Details Column -->
        <div class="col-md-6 px-5">
            <div class="main-container">
                <div class="content">
                    <div>
                        <h3>Choose Ticket</h3>
                    </div>
                    <div class="ticket-container" >
    <h4>Standard Ticket <span>Rs:600</span></h4>
    <button class="decrement">-</button>
    <input type="number" class="input-height" value="0" min="0" max="{{$maxAllowedValueStandard}}" readonly id="standardInput">
    <button class="increment">+</button>
  </div>

  <div class="ticket-container" >
    <h4>Premium Ticket<span>Rs:400</span></h4>
    <button class="decrement">-</button>
    <input type="number" class="input-height" value="0" min="0" max="{{$maxAllowedValuePremium}}" readonly id="premiumInput">

    <button class="increment">+</button>
  </div>

  <div class="ticket-container" >
    <h4>Bussiness Ticket<span>Rs:200</span></h4>
    <button class="decrement">-</button>
    <input type="number" class="input-height" value="0" min="0" max="{{$maxAllowedValueBussiness}}" readonly id="businessInput">
    <button class="increment">+</button>
  </div>

  <div id="total" ></div>
  
                </div>
            </div>
        </div>


        <!-- Form Column -->
        <div class="col-md-6">
            <div class="pb-5 ">
                <!-- Form content goes here -->
<form  method="POST" id="form-submit" action="{{url('/eventdeparturestore')}}">
        @csrf


        


      <div class="row col-md-12">
       <div class="col-sm-12">
        <form method="POST" id="form-submit" action="{{ url('/eventdeparturestore') }}">
    @csrf
    <div class="row col-md-12">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="passenger_name">Passenger Name:</label>
                <input type="text" class="form-control" id="passenger_name" name="passenger_name" required>
                @error('passenger_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <input type="hidden" class="form-control" name="eventdata" value="{{ $EventId }}">

        <div class="col-md-12">
            <div class="form-group">
                <label for="total_passenger">Passenger Address:</label>
                <input type="text" class="form-control" id="passenger_address" name="passenger_address" required>
                @error('passenger_address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="address">Email</label>
                <input type="text" class="form-control" id="email" name="email" >
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="number" class="form-control" id="phone_no" name="phone_no" required>
                @error('phone_no')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Hidden inputs -->
        <input type="hidden" id="standardSeatsInput" name="standard_seats" value="0">
    <input type="hidden" id="premiumSeatsInput" name="premium_seats" value="0">
    <input type="hidden" id="businessSeatsInput" name="business_seats" value="0">
    <input type="hidden" id="total_hidden" name="total" value="0">

        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-5">Submit</button>
            <a href="{{ url('/eventviews/' . $EventId->id) }}" class="btn btn-success">Back page</a>
        </div>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
 
 <script src="{{ asset('home/event/event.js') }}"></script>
</body>
</html>
