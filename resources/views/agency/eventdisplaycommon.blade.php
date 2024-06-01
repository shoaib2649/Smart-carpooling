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

        @include('agency.eventdisplay')

        <!-- main-panel ends -->
        <!-- plugins:js -->
        @include('agency.script')
        <!-- End custom js for this page -->
    </div>
    <!-- page-body-wrapper ends -->

    <!-- container-scroller -->
</body>

</html>
