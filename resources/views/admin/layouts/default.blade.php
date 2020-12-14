<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    @include('admin.layouts.header')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

@include('admin.layouts.sidebar')

        @yield('content')
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="{{url('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
@yield('script')
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

</body>

</html>
