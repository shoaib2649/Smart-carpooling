<!DOCTYPE html>
<html lang="en">

 @include('admin.head')
 
 </style>
  <body>
    <div class="container-scroller ">
      <!-- partial:partials/_sidebar.html -->
      @include('agency.sidebar')
      <!-- partial -->
      @include('agency.header')

        <!-- partial -->
        
        @include('agency.body')
       
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('agency.script')
    <!-- End custom js for this page -->
  </body>
</html>