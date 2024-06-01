<!DOCTYPE html>
<html lang="en">
 @include('admin.head')
 
  <body>
    <div class="container-scroller mt-5">
      <!-- partial:partials/_sidebar.html -->
      @include('agency.sidebar')
      <!-- partial -->

      @include('agency.header')

     
        <!-- partial -->
        

<div class="container " style="margin-top:80px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-white">ID</th>
                <th class="text-white">DriverID</th>
                <th class="text-white">Tittle</th>
                <th class="text-white">From</th>
                <th class="text-white">To</th>
                <!-- <th class="text-white">Departure</th>
                <th class="text-white">Arrival</th> -->
                <!-- <th class="text-white">Status</th> -->
                <th class="text-white" style="colspan: 2;">Actions</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($company as $company)
                <tr>
                    <td   class="text-white">{{ $company->id}}</td>
                    <td   class="text-white">{{ $company->driver_id}}</td>
                    <td  class="text-white">{{ $company->tittle}}</td>
                    <td  class="text-white">{{ $company->fcity}}</td>
                    <td  class="text-white">{{ $company->tcity}}</td>
                    <!-- <td  class="text-white">{{ $company->dtime}}</td>
                    <td  class="text-white">{{ $company->atime}}</td>            -->
  <form action="{{ url('eventapproved/' . $company->id) }}" method="post">
    @csrf
    <td>
    <button type="submit " class="btn btn-success">Accept</button>
    </td>
    </form>
    <form action="{{ url('eventreject/' . $company->id) }}" method="post">
    @csrf
    <td>
    <button type="submit " class="btn btn-danger">Reject</button>
    </td>
</form>

</tr>
            @endforeach
        </tbody>
    </table>
</div>



        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('agency.script')
    <!-- End custom js for this page -->
  </body>
</html>