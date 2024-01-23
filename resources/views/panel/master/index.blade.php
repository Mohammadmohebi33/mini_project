<!DOCTYPE html>
<html lang="en">
@include('panel.master.head')



<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('panel.master.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('panel.master.aside')
    <!-- Content Wrapper. Contains page content -->


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                      @yield('content')
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('panel.master.js')
@include('panel.alerts.sweetalert.success')
</body>
</html>

