<!DOCTYPE html>
<html lang="en">
 <!-- @include('admin.head') -->
 
   
  
  <body >
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      @include('admin.header')

     
        <!-- partial -->

 
     <div class="container" style="margin-top:167px;">
      @if(Session()->has('message'))
      <div class="alert alert-success ">
        {{Session()->get('message')}}
      </div>
      @endif

          <div class="row offset-3 ">
            <div class="col-md-9">

<form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data" color: white;">
    @csrf   
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" style="background-color: inherit;">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" style="background-color: inherit;">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" style="background-color: inherit;">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" style="background-color: inherit;">
    </div>
    <div class="mb-3">
        <label for="discountprice" class="form-label">Discount Price</label>
        <input type="number" class="form-control" id="discountprice" name="discountprice" style="background-color: inherit;">
    </div>
    <div class="mb-3">
        <select name="category" class="form-select" style="background-color: inherit;">
            @foreach($store as $category)
                <option style="background-color: inherit;" value="{{ $category->category }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Image Upload</label>
        <input type="file" class="form-control" id="file" name="image" style="background-color: inherit;">
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Add Category</button>
    </div>
</form>


</div>
</div>
            </div>
            
          <!-- </div> -->
          
        <!-- </div> -->
        <!-- main-panel ends -->
      <!-- </div> -->
      <!-- page-body-wrapper ends -->
   
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>