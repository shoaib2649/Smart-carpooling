<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .form-container {
            max-width: 500px; /* Adjust maximum width as needed */
            margin: auto;
            border: 2px solid #007bff; /* Border color */
            border-radius: 10px;
            box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.1); /* Shadow */
            padding: 20px;
        }
    </style>
</head>

<body>  
    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Ride Form</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-container" action="{{ route('rides.store') }}" method="POST" enctype="multipart/form-data">
               
                    @csrf <!-- CSRF Token -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="driver_id" name="driver_id" required value="{{ session('DriverId') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" class="form-control" id="model" name="model" required placeholder="Enter Model">
                    </div>
                    <div class="form-group">
                        <label for="number">Number:</label>
                        <input type="text" class="form-control" id="number" name="number" required placeholder="Enter Number">
                    </div>
                    <div class="form-group">
                        <label for="startpoint">Start Point:</label>
                        <input type="text" class="form-control" id="startpoint" name="startpoint" required placeholder="Enter Start Point">
                    </div>
                    <div class="form-group">
                        <label for="endpoint">End Point:</label>
                        <input type="text" class="form-control" id="endpoint" name="endpoint" required placeholder="Enter End Point">
                    </div>
                    <div class="form-group">
                        <label for="fare">Fare:</label>
                        <input type="number" class="form-control" id="fare" name="fare" step="0.01" required placeholder="Enter Fare">
                    </div>
                    <div class="form-group">
                        <label for="ride_image">Upload Ride image:</label>
                        <input type="file" class="form-control" id="ride_image" name="ride_image" required placeholder="Upload Ride image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
