
<!DOCTYPE html>
<html lang="en">
 @include('admin.head')
 
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      @include('admin.header')

     
        <!-- partial -->
        
    
    <!-- <div class="container">
        <div class="row md-col-4">
            <h3 class="text-center">All Requested of Agency for Approvel</h3>
        </div>
    </div> -->

<div class="container " style='margin-top: 100px;'>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>District</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($company as $company)
                <tr>
                    <td class="text-white">{{ $company->id }}</td>
                    <td class="text-white">{{ $company->companyname }}</td>
                    <td class="text-white">{{ $company->district }}</td>
                    <td class="text-white">{{ $company->phone }}</td>
                    <td class="text-white">{{ $company->email }}</td>
                    <td class="text-white">{{ $company->role }}</td>
                    <td class="text-white" style="color:blue;">{{ $company->status }}</td>
                    <td>

<form action="{{ url('agencystore/'.$company->id) }}" method="post">
    @csrf
    <!-- your form fields go here -->
    <button type="submit" class="btn btn-primary">Accept</button>
</form>

                      </td>
                    
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
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>