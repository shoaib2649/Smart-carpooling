<!DOCTYPE html>
<html lang="en">
<base href="/public">


 @include('admin.head')
 <style>
  .color{
    color:black;
  }
</style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
<div class="container">
  <div class="col-md-6">
    <form action="{{route('sendemailtouser',$order->id)}}" method="POST" style="margin-top:85px">
      {{$order->email}}
      @csrf
     
      <div class="form-group" >
        <label for="greeting">Greeting:</label>
        <input type="text" class=" color form-control color" id="greeting" name="greeting" required>
      </div>
      <div class="form-group">
        <label for="first-line" >First Line:</label>
        <input  type="text" class="form-control color" id="first-line" name="firstline" required>
      </div>
      <div class="form-group">
        <label for="body">Body:</label>
        <input type="text"  class="form-control  color" id="body" name="body"  required></textarea>
      </div>
       <div class="form-group">
        <label for="button">Button Name:</label>
        <input type="text"  class="form-control  color" id="button" name="btname"  required></textarea>
      </div>
      <div class="form-group">
        <label for="button-url">Email URL:</label>
        <input type="text" class="form-control   color" id="button-url" name="url" required>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name:</label>
        <input type="text" class="form-control  color" id="last-name" name="lastline" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
     </div>
        <!-- partial -->
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>