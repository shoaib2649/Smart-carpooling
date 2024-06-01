<div class="col-md-7 mt-5 mb-5 heading-section text-center ftco-animate">
          	
            <h2>Our Recent Event</h2>
          </div>
<div class="row  mt-5 mb-4">
            <div class="col-md-4 heading-section text-center ftco-animate">
                <h4>You Can Search </h4>
            </div>
        </div>


    <div class="search_portion ml-3">
     <form  method="GET" action="{{ route('event.search') }}">
     <div class="row">
    <div class="col-md-2"> <!-- Set input field to 70% width -->
        <input type="text" id="from_city" name="from_city" placeholder="Enter from city" class="form-control rounded-pill">
    </div>
    <div class="col-md-2"> <!-- Set input field to 70% width -->
        <input type="text" id="to_city" name="to_city" placeholder="Enter to  city" class="form-control rounded-pill">
    </div>
    <div class="col-md-2"> <!-- Set input field to 70% width -->
        <input type="date" id="departure_time" name="departure_time" placeholder="Enter departure" class="form-control rounded-pill">
    </div>
    <div class="col-md-2"> <!-- Set input field to 70% width -->
        <input type="date" id="arrival_time" name="arrival_time" placeholder="Enter arrival time" class="form-control rounded-pill btn-outline-black">
    </div>
    <div class="col-md-4">
    <button type="submit" class="btn btn-outline-success  rounded-pill font-weight-bold w-75 p-2">Search</button>
</div>
</div>

</form>
</div>

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <!-- <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div> -->
        </div>
        <div class="row d-flex">
          @foreach($data as $d)
          <div class="col-md-4 d-flex ">
          	<div class="blog-entry justify-content-end">
            <a href="#" class="block-20" style="background-image: url('/Eventimages/{{ $d->eimage }}');" alt="something wrong"></a>

              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  
                 
                  <div class="font-weight-bold text-capitalize "><span >{{$d->fromcity}}<span> <span class="font-weight-bolder badge rounded-pill bg-warning ">To</span> <span>Attock </span></div><br>
                  <!-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
                  <div ><a href="#" >{{ \Carbon\Carbon::parse($d->created_at)->format('F d, Y') }}
</a></div><br>
                </div>
                <h2 class="heading mt-2 "><a href="#" >Available </a> <span class="ml-2 mr-2 badge rounded-pill bg-warning "><a href="#">{{$d->availble}}</a></span>Seat</h2>
               
                <p><a href="{{url('eventviews/' . $d->id)}}" class="btn btn-primary ml-4">Read more</a></p>
              </div>
            </div>
          </div>
          @endforeach
         
        </div>
        <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
       
       {{$data->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
      </div>
      
    </section>
    