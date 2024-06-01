<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('home.css')
    <style type="text/css" media="screen">
        .active {
            background-color: white;

        }

        .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
            color: blue;
            font-weight: 580;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm  bg-dark ftco-navbar-light  mt-0 mb-5" id="ftco-navbar ">
        <div class="container">
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item {{ request()->is('driverindex') ? 'active' : '' }}">
                        <a href="{{ url('driverindex') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('addevent') ? 'active' : '' }}">
                        <a href="{{ url('addevent') }}" class="nav-link">Add Event</a>
                    </li>
                    <li class="nav-item {{ request()->is('eventshow') ? 'active' : '' }}">
                        <a href="{{ url('eventshow') }}" class="nav-link">Your Events</a>
                    </li>



                    <li class="nav-item  {{ request()->is('rides/create') }}"><a href="{{ route('rides.create') }}"
                            class="nav-link">Add Ride</a></li>
                    <li class="nav-item ">
                        <a href="{{ route('rides.show', ['id' => session('DriverId')]) }}" class="nav-link">Show
                            Ride</a>
                    </li>
                    <!-- <li class="nav-item {{ request()->is('passengerrequest') }}"><a href="{{ url('passengerrequest') }}" class="nav-link">Ride Request</a></li> -->
                    <li class="nav-item {{ request()->is('ridesrequest') }}"><a href="{{ url('ridesrequest') }}"
                            class="nav-link">Ride Request</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>


    @include('home.script');
</body>

</html>
