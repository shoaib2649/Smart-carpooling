<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">What we offer</span>
				<h2 class="mb-2">Feeatured Vehicles</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
				@if($rides->isEmpty())				
				<div class="alert alert-danger font-weight-bolder">Yet no car is available for booking</div>
               @else
					@foreach($rides as $ride)
					<div class="item">
						<div class="car-wrap rounded ftco-animate">
							<!-- <div class="img rounded d-flex align-items-end"
								style="background-image: url('Rideimages/1711183402.jpg');">
							</div> -->

							<div class="img rounded d-flex align-items-end"
								style="background-image: url('{{ 'Rideimages/' . $ride->ride_image }}');">
							</div>

							<div class="text">
								<h2 class="mb-0 text-success font-weight-bold"><a href="#">{{ $ride->name }}</a></h2>
								<div class="d-flex mb-3">
									<span class="cat text-success font-weight-bold">Fare</span>
									<p class="price ml-auto ">{{ $ride->fare }}/ <span class="font-weight-bold text-success">PKR</span></p>
								</div>
								<p class="d-flex mb-0 d-block"><a href="{{ route('rides.booking', ['id' => $ride->id]) }}" class="btn btn-primary form-control rounded-pill text-center font-weight-bold">Book
										now</a> </p>
							</div>
						</div>
					</div>
					
					@endforeach
					

					
				
					@endif
				</div>
			</div>
		</div>
	</div>
</section>