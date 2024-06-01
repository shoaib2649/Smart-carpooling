<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   @include('home.css')
  </head>
  <body>
    <!-- start nav -->
    @include('home.header')

    <!-- END nav -->
  
    <!-- startcoverpage -->
   @include('home.coverpage')
<!-- endcoverpage -->

<!-- Form page start -->
   <!-- @include('home.formpage') -->
    <!-- end form page  -->

<!-- Feature vehicle start  -->
  @include('home.featurevehicle')
<!-- end feature vehicle  -->

   <!-- start about page -->
@include('home.aboutus')
   <!-- end about page -->

		<!-- start services  -->
@include('home.services')
		<!-- end services -->


<!-- start become driver -->
@include('home.becomedriver')
<!-- end become driver -->
	
<!-- start Testimonial  -->
<!-- end Testimonial  -->

   <!-- start testimal  -->
   @include('home.testimal')
   <!-- end testimal  -->
<!-- poll start -->
@include('agency.showpoll')
 <!-- end poll  -->
   <!-- start Blog  -->
   @include('home.blog')
   <!-- end  Blog  -->


    	<!-- Start Experience -->
    	@include('home.experience')
    	<!-- end Experience -->

   	<!-- Start footer  -->
   	@include('home.footer')
   	<!-- end footer  -->

  
    
  

  <!-- script start  -->
  @include('home.script')
  <!-- end script start  -->

 
    
  </body>
</html>