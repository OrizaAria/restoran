<!DOCTYPE html>
<html lang="en">

<head>
    @include('staff.css')
</head>

<body>
    <div class="container-scroller">
        {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
        </div> --}}
        <!-- partial:partials/_sidebar.html -->
        @include('staff.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('staff.navbar')
            <!-- partial -->
            <div class="main-panel">
                @include('staff.body')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('staff.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('staff.js')
    <!-- End custom js for this page -->
</body>

</html>
