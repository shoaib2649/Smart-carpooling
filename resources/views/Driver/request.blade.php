!<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  @include('driver.combineheader')
  <h3 class="mt-5 p-5 text-center">Ride Request</h3>
  
  <div class="container mt-5">
  <table class="table table-bordered">
    <thead class="text-center border-info bg-primary">
      <tr class="text-white">
        <th>ID</th>
        <th>Ride Id</th>
        <th>Passenger Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Status</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody class="text-center border-secondary">
@foreach($requests as $request)
      <tr>
        <td>#{{ $request->id}}</td>
        <td>{{ $request->ride_id }}</td>
        <td>{{ $request->name }}</td>
        <td>{{ $request->email }}</td>
        <td>{{ $request->phone_number }}</td>
        <td>{{ $request->departure }}</td>
        <td>{{ $request->arrival }}</td>
        @if($request->status == 'pending')
        
        <td ><span class="badge text-bg-danger">{{ $request->status }}</span></td>
        @else
        <td ><span class="badge text-bg-success">{{ $request->status }}</span></td>

        @endif
        <td ><a href="{{ route('ride.request.accept', ['id' => $request->id]) }}" class="btn btn-primary">Accept</a></td>
        <td><a href="{{ route('ride.request.reject', ['id' => $request->id]) }}" class="btn btn-danger">Reject</a></td>
        
      </tr>
      @endforeach
      </tbody>
  </table>
</div>

</body>
</html>