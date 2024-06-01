<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Event</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
 <style>
   .bgs{
    border: 1px solid #000;
    margin-top: 100px;
    background-color: rgb(81, 128, 128,0.4);
   }
 </style>
</head>

<body >
  

  <div class="container border border-danger  mb-5 p-5 w-75 bgs">
    <div class="row justify-content-center">
      <div class="col-md-6">
        
        <!-- <h2 class="text-center mb-4">Registration Form</h2> -->
     <form action="{{ route('agencystoreaddevent') }}"method="post" enctype="multipart/form-data">
             @csrf
          <div class="form-group mb-3">
            <label for="name">Tittle</label>
            <input type="text"  name="tittle" class="form-control " id="name" placeholder="Enter your name">
          </div>
          @if($errors->has('tittle'))
    <div class="alert alert-danger">{{ $errors->first('tittle') }}</div>
@endif

          <div class="form-group mb-3">
            <label for="email">From City</label>
            <input type="text" name="fcity"class="form-control" id="email" placeholder="Enter your email">
          </div>
          @if($errors->has('fcity'))
    <div class="alert alert-danger">{{ $errors->first('fcity') }}</div>
@endif
          <div class="form-group mb-3">
            <label for="email">To City</label>
            <input type="text" name="tcity"class="form-control" id="email" placeholder="Enter your email">
          </div>
          @if($errors->has('tcity'))
          <div class="alert alert-danger">{{$errors->first('tcity')}}</div>
@endif
          <div class="form-group mb-3">
            <label for="password">Details</label>
            <textarea type="text" name="detail" class="form-control"  placeholder="Enter your Detail"></textarea>
          </div>
          @if($errors->has('detail'))
    <div class="alert alert-danger">{{ $errors->first('detail') }}</div>
@endif
          <div class="form-group mb-3">
        <label for="departure_time">Departure Time</label>
        <input type="time" id="departure_time" name="dtime" class="form-control" placeholder="Enter the departure time" onchange="updateArrivalTimeConstraints();">
    </div>
    @if($errors->has('dtime'))
    <div class="alert alert-danger">{{ $errors->first('dtime') }}</div>
@endif

    <div class="form-group mb-3">
        <label for="arrival_time">Arrival Time</label>
        <input type="time" id="arrival_time" name="atime" class="form-control" placeholder="Enter the arrival time">
         <p id="arrival_time_error" class="text-danger" style="display: none;">Arrival time must be after departure time.</p>
    </div>
    @if($errors->has('atime'))
    <div class="alert alert-danger">{{ $errors->first('atime') }}</div>
@endif

    <div class="form-group mb-3">
            <label for="standard">Standard Seat</label>
            <input type="number" name="standard_seat"class="form-control" id="standard" placeholder="Enter your standard seat " min=0>
          </div>
          @if($errors->has('standard_seat'))
    <div class="alert alert-danger">{{ $errors->first('standard_seat') }}</div>
@endif
          <div class="form-group mb-3">
            <label for="premium_seat">Premium Seat</label>
            <input type="number" name="premium_seat"class="form-control" id="premium_seat" placeholder="Enter your premium seat" min=0>
          </div>
          @if($errors->has('premium_seat'))
    <div class="alert alert-danger">{{ $errors->first('premium_seat') }}</div>
@endif
          <div class="form-group mb-3">
            <label for="bussiness">Bussiness Seat</label>
            <input type="number" name="bussiness_seat"class="form-control" id="bussiness" placeholder="Enter your bussiness seat" min=0>
          </div>
          @if($errors->has('bussiness_seat'))
    <div class="alert alert-danger">{{ $errors->first('bussiness_seat') }}</div>
@endif

          <div class="form-group">
               <p class="form-text text-muted mb-3">

                 Select Driver
                </p>
            <select class="form-control mb-3" name="driver_id" id="district" >
              @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                
              @endforeach
            </select>
        </div>
          <div class="form-group mb-3">
            <label for="confirmPassword">Event Image</label>
            <input type="file" name="eimage" class="form-control" >
            @if($errors->has('eimage'))
            <div class="alert alert-danger"> {{ $errors->first('eimage') }}</div>
            @endif
          </div>

          <button type="submit" class="btn btn-primary btn-block w-50">Add</button>
        </form>
      </div>
    </div>
  </div>
  <script>
   
    function updateArrivalTimeConstraints() {
        var departureTime = document.getElementById('departure_time').value;
        document.getElementById('arrival_time').setAttribute('min', departureTime);
        checkArrivalTimeValidity();
        console.log(departureTime);
    }

    function checkArrivalTimeValidity() {
        var departureTime = document.getElementById('departure_time').value;
        var arrivalTime = document.getElementById('arrival_time').value;
        var arrivalTimeError = document.getElementById('arrival_time_error');

        var departureDate = new Date('2000-01-01 ' + departureTime);
        var arrivalDate = new Date('2000-01-01 ' + arrivalTime);

        if (arrivalDate >= departureDate) {
            arrivalTimeError.style.display = 'block';
        } else {
            arrivalTimeError.style.display = 'none';
        }
    }

</script>
</body>
</html>

