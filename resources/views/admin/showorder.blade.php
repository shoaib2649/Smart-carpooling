<!DOCTYPE html>
<html lang="en">
<style> 

th,td{
  
  padding-bottom:11px;
  text-align:center;
  border:3px solid green;
}


</style>
 @include('admin.head')
 
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      @include('admin.header')



     <div class="main-panel ">
       <div class="content-wrapper">
        <div class="">
         <div class="offset-5 mb-3 "> All Orders</div>
          <form action="{{route('searchdata')}}" method="get" >
            <div class="input-group mb-3">
  <input  style="color:black;" type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="search-button" name="search">
  <button class="btn btn-primary" type="submit" id="search-button">Search</button>
</div>

          </form>
         
         <table  style="background-color: white; color:blue;margin-top:56px">
    <thead >
      <tr>
        <th>CartId</th>
            
            <th>Email</th>
            
            
            <th>Price </th>
            <th>Quantity</th>
           
            <th>Payment Status</th>
            <th>Delivery Status</th>
    
             <th>Image</th>
             <th colspan="4" style="text-align:center">Action</th>
          
            
      </tr>
    </thead>
    <tbody>
      @forelse($orders as $order)

      <tr>
        <td>{{$order->id}}</td>
       
        <td>{{$order->email}}</td>
        
        <td>{{$order->price}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->paymentstatus}}</td>
        <td>{{$order->delevierystatus}}</td>
        <td><img src="{{'product/' . $order->image}}" alt="" width="80px" height="80px"></td>
          <td>
          
@if($order->delevierystatus=='Processing')
            <a href="{{route('orderdeliver',$order->id)}}" class="btn btn-primary">Delivered</a>
            @else
            <h1 class="alert alert-success" style="color:green;font-size:15px;">Deliverd</h1>
@endif
            </td>
            <td> <a href="{{route('detailorder',$order->id)}}" class="alert alert-primary">Pdf</a></td>
   

            <td> <a href="{{route('emailsend',$order->id)}}" class="btn btn-info" style="text-decoration:none;font-size:bold;">Send Email</a></td>
     @if($order->delevierystatus=='You cancel the order')
     <td><a href="{{route('removeorder',$order->id)}}" class="btn btn-danger">Remove order</a></td>
    
     @endif
      </tr>
@empty
      <tr>
        <td colspan="23" style="color:black;font-size:24px;">Data not found</td>
      </tr>
      @endforelse
    </tbody>
  </table>


       </div>
       </div>
     </div>
       
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>