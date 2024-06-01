<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Bootstrap 5 Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <section class="h-100">
    <div class="container h-400 ">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-6 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
            <img src="{{asset('customfile/images/logo.png')}}" alt="logo" width="150" class="rounded-circle img-thumbnail">
          </div>
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <h1 class="fs-4 card-title fw-bold mb-4 text-center">Agency Register</h1>
              <form method="POST"  action="{{route('agencyrequest')}}">
                 @csrf
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="firstname">Company Name</label>
                  <input id="name" type="text" class="form-control" name="companyname" value="" required autofocus>
                  
                </div> 
                

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" required>
                 
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="password">Password</label>
                  <input id="password" type="password" class="form-control" name="password" required>
                    
                </div> 
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="phone">Phone</label>
                  <input id="password" type="number" class="form-control" name="phone" required>   
                </div>

      
<div class="form-group">
               <p class="form-text text-muted mb-3">
                 Select District
                </p>
            <select class="form-control mb-3" name="district" id="district" >
                
                    <option value="Khushab">Khushab</option>
                    <option value="Miawali">Miawali</option>
                    <option value="Sargodha">Sargodha</option>
                    <option value="Lahore">Lahore</option>
              
            </select>
        </div>

        <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary w-50 align-item-center rounded-pill">Register</button>
</div>
               
              </form>
            </div>
            <div class="card-footer py-3 border-0">
              <div class="text-center">
                Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </section>

</body>
</html>