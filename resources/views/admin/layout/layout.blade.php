<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="{{url('admin/text/css" href="js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- for icons -->
  <link rel="stylesheet" href="{{url('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('admin/images/favicon.png')}}" />
  <!-- custom css -->
  <link rel="stylesheet" href="{{url('admin/css/custom.css')}}" />
  <!-- end custom css -->
  <!-- for datatable css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<!-- end datatable css -->
 <!-- laravel toster -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- end laravel toster -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.sidebar')
      <!-- partial -->
      @yield('content')
      
      <!-- main-panel ends -->

    </div>
    
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{url('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{url('admin/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('admin/js/off-canvas.js')}}"></script>
  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('admin/js/template.js')}}"></script>
  <script src="{{url('admin/js/settings.js')}}"></script>
  <script src="{{url('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('admin/js/dashboard.js')}}"></script>
  <script src="{{url('admin/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
  <!-- custom js -->
  <script src="{{url('admin/js/custom.js')}}"></script>
  <!-- sweet alert script -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- end sweet alert script -->
 
  <script>
        @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.warning("{{ session('warning') }}");
        @endif
</script>
</body>

</html>

