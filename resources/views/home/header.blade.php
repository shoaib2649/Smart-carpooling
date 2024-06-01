<!DOCTYPE html>
<html>
<head>
	<title>header</title>
	 <style>
    /* Custom CSS to make the placeholder text transparent */
  
    form{
    	 margin-left: 0px;
    	 background-color: transparent;
    }
  /* Override Bootstrap's active color for the nav-link */
.nav-item.active .nav-link,
.nav-item:hover .nav-link {
    color: blue !important;

}


  </style>
</head>
<body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light " id="ftco-navbar "  >

	    <div class="container-fluid bg-dark mt-0">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	     
	          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link ">Home</a></li>
	          <li class="nav-item"><a href="{{url('aboutview')}}" class="nav-link">About</a></li>
	          {{-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>
<li class="nav-item"><a href="pricing.html" class="nav-link">Contact</a></li> --}}
<li class="nav-item"><a href="{{ route('header.event') }}" class="nav-link">Event</a></li>
	         
<li class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" id="registrationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Registration
	</a>
	<div class="dropdown-menu" aria-labelledby="registrationDropdown">
		<a href="{{ route('registration') }}" class="dropdown-item">Register as Passenger</a>
		<a href="{{ url('/driverform') }}" class="dropdown-item">Register as Driver</a>
		<a href="{{ route('agencyregistration') }}" class="dropdown-item">Register as Agency</a>
	</div>

</li>
</ul>
<!-- @if(session()->has('adminId') || session()->has('AgencyId') || session()->has('DriverId'))
  <li class="nav-item"><a  class="btn btn-primary" href="{{ route('logout') }}" class="nav-link">Logout</a></li>
   
   @elseif(session()->has('PassengerId'))
    <li class="nav-item"><a  class="btn btn-primary" href="{{ route('logout') }}" class="nav-link">Logout</a></li>
<li class="nav-item ml-2 "><a  class="btn btn-success" href="{{ url('psgprofile') }}" class="nav-link">Profile</a></li>

@else
  <li class="nav-item" id="login"><a class="btn btn-primary w-100" href="{{ route('login') }}" class="nav-link">Login</a></li>
  
@endif -->

<ul class="navbar-nav ml-auto">
                @if(session()->has('adminId') || session()->has('AgencyId') || session()->has('DriverId'))
                    <li class="nav-item"><a class="btn btn-primary" href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                @elseif(session()->has('PassengerId'))
                    <li class="nav-item"><a class="btn btn-primary" href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                    <li class="nav-item ml-2"><a class="btn btn-success" href="{{ url('psgprofile') }}" class="nav-link">Profile</a></li>
                @else
                    <li class="nav-item" id="login"><a class="btn btn-primary rounded w-100" href="{{ route('login') }}" class="nav-link">Login</a></li>
                @endif
            </ul>



	      </div>
	    </div>
	  </nav>
</body>
</html>