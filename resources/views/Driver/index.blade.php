<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-container {
            width: 600px;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 20px;
            text-align: center;
            margin-top:230px;
            margin-bottom: 10px;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: auto;
            margin-bottom: 20px;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-field {
            text-align: left;
            margin-bottom: 15px;
        }
        .profile-field label {
            
            display: block;
        }
        .profile-field input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 16px;
        }
        .phone-number {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container  mt-5">
        <div class="content">
            
            @if(session('message'))
            <div class="alert alert-success mt-5 mb-5 w-50 text-center ml-5" id="flash-message">
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
                    }, 5000);
                });
                </script>
@endif
</div>
@include('driver.combineheader')
    <div class="profile-container ">
        <div>
            <h3>Driver Profile</h3>
        </div>
        <div class="profile-picture">
            <img src="{{asset('Rideimages/profile.jpg')}}" alt="Driver Profile Picture">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="profile-field">
                    <label for="driver-id">Driver Name:</label>
                    <input type="text" id="driver-id" value="{{ $activedriver->name}}" readonly>
                </div>
                <div class="profile-field">
                    <label for="name">Email:</label>
                    <input type="text" id="name" value="{{$activedriver->email }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-field">
                    <label for="email">Address:</label>
                    <input type="text" id="email" value="{{ $activedriver->address }}" readonly>
                </div>
                <div class="profile-field">
                    <label for="email">District:</label>
                    <input type="text" id="email" value="{{ $activedriver->district }}" readonly>
                </div>
                
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="profile-field">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="email" value="{{ $activedriver->phone }}" readonly>
                </div>
            </div>
            <div class="col-md-12">
    <div class="profile-field d-flex justify-content-center align-items-center">
        <a class="btn btn-primary w-50  rounded-pill" href="{{url('vieweditfile/' . $activedriver->id)}}" id="Edit-profile">Edit Profile</a>
    </div>
</div>

        </div>
    </div>
  </div>
</body>
</html>
