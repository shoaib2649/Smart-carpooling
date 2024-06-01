<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <style>
    .container-fluid {
      margin-top: 100px;
      padding-bottom: 170px;
    }
  </style>
</head>
<body>
	@include('driver.combineheader')
	
  @if(session('message'))
    <div class="alert alert-info mt-5 mb-5 w-50 text-center ml-5" id="flash-message">
        {{ session('message') }}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Automatically hide the flash message after 5 seconds
            setTimeout(function() {
                var flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    flashMessage.style.display = 'none';
                }
            }, 3000);
        });
    </script>
@endif

<div class="container-fluid ">
    <h3 class="mt-5 text-center">Published Event</h3>
  <table class="table table-bordered">
    <thead class="text-center border-info bg-primary">
      <tr >
        <th>ID</th>
        <th>Tittle</th>
        <th>From</th>
        <th>To</th>
        <th>Arrival Time</th>
        <th>Departure Time</th>
        <th>Images</th>
        <th style="column-span:3">Action</th>
      </tr>
    </thead>
    <tbody class="text-center border-secondary">
@foreach($Event as $event)
      <tr>
        <td>{{$event->id }}</td>
        <td>{{$event->tittle}}</td>
        <td>{{ $event->fromcity}}</td>
        <td>{{ $event->tocity}}</td>
        <td>{{$event->atime }}</td>
        <td>{{ $event->dtime}}</td>
        <td><img src="{{ asset('/Eventimages/' . $event->eimage) }}" alt="Something wrong" width="100px" height="100px"></td>
        <td><a href="{{url('editevent/' . $event->id)}}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{url('eventreject/' . $event->id)}}" class="btn btn-danger">Delete</a></td>
        
      </tr>
      @endforeach
      </tbody>
  </table>
</div>

</body>
</html>