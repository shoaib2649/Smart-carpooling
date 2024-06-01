<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>

<body>

    <div class="container-fluid mt-5">
        @if ($rides->isEmpty())
            <div class="alert alert-danger text-center font-weight-bold text-primary">You have not published any cars yet
            </div>
        @endif

        @foreach ($rides as $ride)
            <div class="row
                mb-5">
                <div class="col-md-5">
                    <!-- Show ride image -->
                    <img src="{{ asset('Rideimages/' . $ride->ride_image) }}" alt="Ride Image" width="100%"
                        height="auto">
                </div>
                <div class="col-md-7">
                    <!-- Show ride details -->
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 30%;">Name</th>
                                <td>{{ $ride->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Model</th>
                                <td>{{ $ride->model }}</td>
                            </tr>
                            <!-- Add more ride details as needed -->
                            <tr>
                                <th scope="row">Number</th>
                                <td>{{ $ride->number }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Fare</th>
                                <td>{{ $ride->fare }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Start Point</th>
                                <td>{{ $ride->startpoint }}</td>
                            </tr>
                            <tr>
                                <th scope="row">End Point</th>
                                <td>{{ $ride->endpoint }}</td>
                            </tr>
                            <!-- Status  -->
                            <tr>
                                <th scope="row">Status</th>
                                <td>
                                    @if ($ride->status == 'inactive')
                                        <div class="alert alert-danger mb-0 text-capitalize text-center font-weight-bold"
                                            role="alert">{{ $ride->status }}</div>
                                    @else
                                        <div class="alert alert-success mb-0 text-capitalize text-center font-weight-bold"
                                            role="alert">{{ $ride->status }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Action</th>
                                <td>
                                    <a href="{{ route('rides.edit', ['id' => $ride->id]) }}"
                                        class="btn btn-primary form-control rounded-pill">Edit</a>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
