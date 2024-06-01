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
                <th class="text-white">Name</th>
                <th class="text-white">District</th>
                <th class="text-white">Phone</th>
                <th class="text-white">Email</th>
                <th class="text-white">Address</th>
               
                <th class="text-white">Status</th>
                <th class="text-white  colspan-3">Actions</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($company as $company)
                <tr>
                    <td   class="text-white">{{ $company->id}}</td>
                    <td  class="text-white">{{ $company->name}}</td>
                    <td  class="text-white">{{ $company->district}}</td>
                    <td  class="text-white">{{ $company->phone}}</td>
                    <td  class="text-white">{{ $company->email}}</td>
                    <td  class="text-white">{{ $company->address}}</td>           
                             
    <td class="text-white">{{ $company->status }}</td>
<form action="{{ url('driveraprove/' . $company->id) }}" method="post">
    @csrf
    <td>
    <!-- your form fields go here -->
    <button type="submit " class="btn btn-success">Accept</button>
    </td>
</form>
<form action="{{ url('disapprovedriver/' . $company->id) }}" method="post">
    @csrf
    <td>
    <!-- your form fields go here -->
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