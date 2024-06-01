<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Responsive Login Form</title>
  <style>
    .form-control.blue-outline:focus {
      box-shadow: none; /* Remove the default shadow */
      border-color: #007bff; /* Blue border color when focused */
    }
    .form-control.blue-outline {
      border-radius: 25px; /* Rounded border radius */
      border-color: #007bff; /* Blue border color */
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Full viewport height */
    }
    .card{
      /* border:2px solid blue; */
      border-radius:30px;
      padding:54px;
      box-shadow: 0px 12px 1px 13px rgba(230,129,190);
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="col-md-6">
    <h3 class="text-center mb-5">Login </h3>
    
    <div class="card ">
      <div class="card-body">
        <form action="{{route('verify')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="username">Email:</label>
            <input type="text" class="form-control blue-outline" id="username" placeholder="Enter your username" name="email">
            @error('email')
            <div class="alert alert-danger p-3 mt-2 w-100 text-center">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control blue-outline" id="password" placeholder="Enter your password" name="password">
            @error('password')
            <div class="alert alert-danger p-3 mt-2 w-100 text-center">{{$message}}</div>
            @enderror
          </div>

          @if(session('message'))
          <div class="alert alert-danger mt-5 mb-5 w-100 text-center" id="flash-message">
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
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success w-50 align-item-center rounded-pill">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
