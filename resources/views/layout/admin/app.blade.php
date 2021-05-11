<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.admin.header')
    @yield('internal_css') 
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 @include('layout.admin.navbar')
     @include('layout.admin.side')
  @yield('content')
  
  

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layout.admin.footer')
  @yield('footer_script')
</body>
</html>
