

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
    <div class="row mt-1 p-5">
        <button class="btn btn-custom"><a href="#" class="col-md-2 font-weight-bolder">Reviews</a></button>
        <button class="btn btn-custom"><a href="{{ route('header.writereview', ['event_id' => $id]) }}" class="col-md-2 font-weight-bolder">Write a review</a></button>
        
    </div>
        
        <!-- Second Row -->
        <div class="row  mr-3">
            <div class="col-md-4">
            
    <h2>Review Ratings</h2>
    <div>Total  review {{$totalVotes}}</div>
    @foreach($passenger_rating_detail as $rating)
        <div class="mb-3">
          
        <span class="font-weight-bold">{{ $rating->rating }} Star</span>
        
            <div class="progress">
                @php
    $percentage = ($totalVotes != 0) ? ($rating->rating_count / $totalVotes) * 100 : 0;
    $colorClass = ($percentage <= 20) ? 'bg-danger' : (($percentage <= 40) ? 'bg-primary' : 'bg-success');
                @endphp
                <div class="progress-bar {{ $colorClass }}" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"  >{{ round($percentage, 2) }}% </div>
            </div>
        </div>
    @endforeach


                
            </div>
            <div class="col-md-8 pl-5">
    @if ($passenger_review->isEmpty())
        <!-- Display a message if passenger details are empty -->
        <p class="alert alert-success text-center">Yet No Reveiw</p>
    @else
    <h2 class="text-center">All Passenger Review</h2>
        @foreach($passenger_review as $reviw_rating_detail)
            <!-- Avatar image and name section -->
            <div class="d-flex align-items-center mb-4">
                <!-- Avatar image -->
                <img src="{{ asset('Avatar-Profile-Vector.png') }}" alt="Avatar" class="mr-3" style="width: 50px;">
                <!-- User name -->
                <h5 class="mb-0">{{ $reviw_rating_detail->name }}</h5>
            </div>

            <!-- Rating section -->
            <div class="mb-4">
                <!-- Insert your rating HTML here -->
                <div class="rating-container">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $reviw_rating_detail->rating)
            <span ><i class="fas fa-star"></i></span>
        @else
            <span><i class="far fa-star"></i></span>
        @endif
    @endfor
</div>


            <!-- Time section -->
            <p class="mb-2">{{ \Carbon\Carbon::parse($reviw_rating_detail->created_at)->format('M D Y ') }}<span class="font-weight-bold">{{ $reviw_rating_detail->category}}</span></p>



            <!-- Review section -->
            <p>{{ $reviw_rating_detail->review }}</p>
        @endforeach
    @endif
</div>


        </div>
    </div>
<!-- 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    
</body>
</html>
