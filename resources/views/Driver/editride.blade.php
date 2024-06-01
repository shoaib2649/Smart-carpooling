<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ride</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Edit Ride</h2>
        <form action="{{ route('rides.update', ['ride' => $ride->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Method Spoofing for PUT request -->
            <div class="form-group">
                <input type="hidden" class="form-control" id="driver_id" name="driver_id"
                    value="{{ session('DriverId') }}">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $ride->name }}">
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $ride->model }}">
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ $ride->number }}">
            </div>
            <div class="form-group">
                <label for="startpoint">Start Point:</label>
                <input type="text" class="form-control" id="startpoint" name="startpoint"
                    value="{{ $ride->startpoint }}">
            </div>
            <div class="form-group">
                <label for="endpoint">End Point:</label>
                <input type="text" class="form-control" id="endpoint" name="endpoint" value="{{ $ride->endpoint }}">
            </div>
            <div class="form-group">
                <label for="fare">Fare:</label>
                <input type="text" class="form-control" id="fare" name="fare" value="{{ $ride->fare }}">
            </div>
            <div class="form-group mb-0">
                <select class="form-control" id="status" name="status">
                    <option value="active" {{ $ride->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $ride->status == 'inactive' ? 'selected' : '' }}>Inactive
                    </option>
                </select>
            </div>
            <!-- Other input fields for editing ride details -->

            <div class="form-group">
                <label for="ride_image">Current Ride Image:</label><br>
                <img src="{{ asset('Rideimages/' . $ride->ride_image) }}" alt="Current Ride Image" width="150"><br>
                <!-- <label for="remove_image">Remove Image:</label>
                <input type="checkbox" id="remove_image" name="remove_image" value="1"> -->
            </div>
            <div class="form-group">
                <label for="new_ride_image">Upload New Ride Image:</label>
                <input type="file" class="form-control" id="new_ride_image" name="new_ride_image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
