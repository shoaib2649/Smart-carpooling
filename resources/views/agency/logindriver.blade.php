<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Table Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<div class="container">
    <h2 class="text-center mt-5 mb-5">Real Time Tracking</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Track Driver</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
            <tr >
                <td>{{ $driver->name }}</td>
                <td>{{ $driver->email }}</td>
                <td>{{ $driver->phone }}</td>
                <td>{{ $driver->address }}</td>
                
                @if($driver->status == '1')
                <td class="badge rounded-pill bg-success">Online</td>
                <td> <a href="{{ route('show.tracking', ['id' => $driver->id])  }}" class="btn btn-primary rounded-pill">Track Location</a></td>
               
                @else
                <td class="badge rounded-pill bg-danger text-white">Offline</td>
                @endif

            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
