<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Bootstrap 5 Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <section class="h-100 ">
    <div class="container h-400 ">
      <div class="row justify-content-sm-center h-100 m">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
         <!--  <div class="text-center my-5">
            <img src="{{asset('customfile/images/logo.png')}}" alt="logo" width="150" class="rounded-circle img-thumbnail">
          </div> -->
          <div class="card shadow-lg ">
            <div class="card-body p-5">
              <h1 class="fs-4 card-title fw-bold mb-4">Passenger Edit Profile</h1>
              <form method="POST"  action="{{url('/profileupdate/'.$data->id)}}">
                 @csrf
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="firstname">Passenger Name</label>
                  <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}" required autofocus>
                  
                </div> 
                

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" required value="{{$data->email}}">
                 
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="password">Password</label>
                  <input id="password" type="number" class="form-control" name="password" required value="{{$data->password}}">   
                </div> 
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="phone">Phone</label>
                  <input id="password" type="number" class="form-control" name="phone" required value="{{$data->phone}}">   
                </div>
                  <div class="mb-3">
                  <label class="mb-2 text-muted" for="phone">Address</label>
                  <input id="password" type="text" class="form-control" name="address" required value="{{$data->address}}">   
                </div>
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="phone">Date of Birth</label>
                  <input id="password" type="date" class="form-control" name="Dob" required value="{{$data->date_of_birth}}">   
                </div>

    
        <div class="form-group">
               <p class="form-text text-muted mb-3">
                 Select District
                </p>
            <select class="form-control mb-3" name="district" id="district" >
                   

    <option value="Khushab"{{ $data->Khushab == 'Khushab' ? 'selected' : '' }}>Khushab</option>
                    <option value="Miawali" {{$data->Miawali=='Miawali'?'selected' :''}}>Miawali</option>
                    <option value="Sargodha" {{$data->sargodha=='sargodha' ? 'selected' : ''}}>Sargodha</option>
                    <option value="Lahore" {{$data->lahore=='lahore'? 'selected' : '' }}>Lahore</option>
              
            </select>
        </div>
                <div class="align-items-center d-flex">
                  <button type="submit" class="btn btn-primary ms-auto">
                    Update 
                  </button>
                </div>
              </form>
            </div>
            
          </div>
         
        </div>
      </div>
    </div>
  </section>

</body>
</html>