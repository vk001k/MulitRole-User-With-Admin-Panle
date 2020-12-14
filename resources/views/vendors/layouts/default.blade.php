<!DOCTYPE html>
<html lang="en">

@include('vendors.layouts.head')

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('vendors.layouts.header')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

@include('vendors.layouts.sidebar')

        @yield('content')
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="{{url('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@yield('script')
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
