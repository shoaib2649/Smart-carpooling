<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page of Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('home/event/event.css')}}">
</head>
<body>



<div class="container">
    <div class="header">
        <h3>Event Detail</h3>
        <h1>{{$detailpage->title}}</h1>
    </div>
    <div class="sub-container">
        <div class="content">
            <img src="{{asset('/Eventimages/' . $detailpage->eimage)}}" alt="">
            <table>
                <tr>
                    <th>Driver Name</th>
                    <td>{{$driverdetail->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$driverdetail->email}}</td>
                </tr>
                <tr>
                    <th>District</th>
                    <td>{{$driverdetail->district}}</td>
                </tr>
            </table>
        </div>

        <div class="content">
            <table>
                <tr>
                    <th>Title</th>
                    <td>{{ $detailpage->tittle }}</td>
                </tr>
                <tr>
                    <th>From City</th>
                    <td class="align">{{$detailpage->fromcity}}</td>
                </tr>
                <tr>
                    <th>To City</th>
                    <td class="align">{{$detailpage->tocity}}</td>
                </tr>
                <tr>
                    <th>Arrival Time</th>
                    <td class="align">{{$detailpage->atime}}</td>
                </tr>
                <tr>
                    <th>Total Seats</th>
                    <td class="align">{{$detailpage->total_seats}}</td>
                </tr>
                <tr>
                    <th>Available Seats</th>
                    <td class="align">{{$detailpage->availble}}</td>
                </tr>
                <tr>
                    <th>Departure Time</th>
                    <td class="align">{{$detailpage->dtime}}</td>
                </tr>
                <tr>
                    <th>Detail of Event</th>
                </tr>
                <tr>
                    
              
    <td class="text-left ">{{$detailpage->detail}}</td>
</tr>

              
               
            </table>
        </div>
    </div>
   
</div>

<script src="{{ asset('home/event/event.js') }}"></script>
</body>
</html>
    