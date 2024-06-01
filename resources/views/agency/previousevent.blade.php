@include('home.css')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Our Past Event</h2>
            </div>
        </div>

        <div class="row  mb-5">
            <div class="col-md-4 heading-section text-center ftco-animate">
                <h4>You Can Search </h4>
            </div>
        </div>
    <div class="search_portion mt-5 mb-5 ">
     <form  method="GET" action="{{ route('previousevent.search')}}">
     <div class="row">
    <div class="col-md-10"> <!-- Set input field to 70% width -->
        <input type="text" id="to_city" name="to_city" placeholder="Enter city" class="form-control rounded-pill">
    </div>
    <div class="col-md-2">
    <button type="submit" class="btn btn-outline-success  rounded-pill p-3 w-100">Search</button>
</div>
</div>

</form>
</div>
        <div class="row">


@if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
@else
    <!-- Display the events -->



            @foreach($data as $event)
            <div class="col-md-4 mb-4">
                <div class="blog-entry d-flex flex-column align-items-center shadow p-3 bg-body rounded">
                    <img class="testimony-wrap rounded-circle mb-4" src="{{ asset('/Eventimages/' . $event->eimage) }}"  alt="" width="150px" height="150px">
                    <div class="text text-center">
                        <div class="meta mb-3">
                            <a href="#" style="font-size:14px" class="text-capitalize">{{ $event->fromcity }} <span class="arrow-icon text-capitalize" style="color:green;font-size: 24px:font-weight:13px">&#8594;</span> {{ $event->tocity }}</a>
                        </div>
                        <div>
                            <h6 class="text-success text-capitalize">{{$event->fromcity}} <span class="text-capitalize">{{$event->tocity}}</span></h6>
                        </div>
                        <h5 class="heading mt-2">{{$event->tittle}}</h5>
                        <p><a href="{{ route('header.veiwdetail', ['id' => $event->id]) }}" class="btn btn-primary">View Detail</a></p>
                        <p> <a href="{{ route('header.userreview', ['id' => $event->id]) }}" class="btn btn-info">User Review</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-4">
                {{ $data->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
@include('home.script')
