<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>      

        <!-- Themes files start-->
        <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendor/datatables/responsive.dataTables.min.css" rel="stylesheet">       
<!-- Themes files start-->
    
   </head>
    
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">THO<sup>2</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
<!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Expense
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ExpenseTab" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-list "></i>
                        <span>Expense</span>
                    </a>
                    <div id="ExpenseTab" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu:</h6>
                            <a class="collapse-item" href="{{ url('expenses/view') }}">Expenses</a>
                            <a class="collapse-item" href="{{ url('tax/view') }}">GST TAX</a>
                        </div>
                    </div>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Account
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accountTab" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-list "></i>
                        <span>Account</span>
                    </a>
                    <div id="accountTab" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu:</h6>
                            <a class="collapse-item" href="{{ url('account/list') }}">Accounts</a>
                            <a class="collapse-item" href="{{ url('account-group/list') }}">Account Group</a>
                        </div>
                    </div>
                </li>
                   
                <hr class="sidebar-divider d-none d-md-block">
                
                 <!-- Heading -->
                <div class="sidebar-heading">
                    PURCHASE
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#purchase" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-shopping-bag"></i>
                        <span>Purchase</span>
                    </a>
                    <div id="purchase" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Purchase</h6>
                            <a class="collapse-item" href="{{url('purchase/view_purchase_order')}}">Purchase Orders</a> 
                        </div>
                    </div>
                </li>

                 <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setup" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Setups</span>
                    </a>
                    <div id="setup" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Setups</h6>
                            <a class="collapse-item" href="{{url('setups/contact/view_contact')}}">Contact Details</a>
                            <a class="collapse-item" href="{{url('setups/event/view_event')}}">Event Details</a>
                            
                            
                        </div>
                    </div>
                </li>

                 <hr class="sidebar-divider d-none d-md-block">
                
                 <!-- Heading -->
                <div class="sidebar-heading">
                    Sales
                </div>
                

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Sales</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">sales:</h6>
                            <a class="collapse-item" href="{{ url('sales/customers') }}">Customer Setup</a>
                             <a class="collapse-item" href="{{ url('sales/invoice-items') }}">Invoice Item Setup</a>
                           <a class="collapse-item" href="{{ url('setups/category') }}">Category</a>
                            <a class="collapse-item" href="{{ url('setups/country') }}">Country</a>
                            <a class="collapse-item" href="{{ url('setups/region') }}">Region</a>
                            <a class="collapse-item" href="{{ url('setups/location') }}">Location</a>
                            
                        </div>
                    </div>
                </li>
    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesm" aria-expanded="true" aria-controls="collapseUtilitiesm">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Management</span>
                    </a>
                    <div id="collapseUtilitiesm" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Management:</h6>
                            <a class="collapse-item" href="{{url('acounts-discount-setup')}} ">Account Discount Setup</a>
                       
                            <a class="collapse-item" href="{{url('discount-Periods-Setup')}} ">Discount Periods Setup</a>
                            
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item ">
                    <a class="nav-link" href="">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>


                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">                          

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">0</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <!--                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                                            <div class="mr-3">
                                                                                <div class="icon-circle bg-primary">
                                                                                    <i class="fas fa-file-alt text-white"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <div class="small text-gray-500">December 12, 2019</div>
                                                                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                                                            </div>
                                                                        </a>-->

                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ ucfirst(Auth::user()->name) }}</span>
                                    <img class="img-profile rounded-circle" src="{{asset('assets/img/user-icons.png')}}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ url('/user/profile/edit/'.Auth::user()->id) }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>                                   
                                    <a class="dropdown-item" href="{{ url('/user/activity-log') }}">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                   @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
                            </div>
                            
                        </div>
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright ©THO Admin Panel 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary"   href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

       
        
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('assets') }}/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('assets') }}/js/demo/chart-area-demo.js"></script>
        <script src="{{ asset('assets') }}/js/demo/chart-pie-demo.js"></script>
   <!-- Page level plugins -->
  <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 <script src="{{ asset('assets') }}/vendor/datatables/dataTables.responsive.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script>
  <script src="{{ asset('assets') }}/js/jquery.validate.min.js"></script>
  
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script>
    function discount_item(req) {
    $.ajax({
        type: "GET",
        url: "{{url('list-of-discount-items')}}",
        data: 'id=' + req,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        success: function (result) {
            var tabledata = '';
            $.each(result, function (index, element) {


                tabledata += "<tr>" +
                        "<td>" + element.item_description + "</td>" +
                        "<td>" + element.discount_amount + "</td>" +
                        "<td>" + element.discount_percent + "</td>" +
                        "<td>" + element.created_at + "</td>" +
                        "<td>" + element.updated_at + "</td>" +
                        "<td> <a href=javascript:editaccountdiscount('"+ element.item_description + "','" + element.discount_amount + "','" + element.discount_percent + "','" + element.account_discount_id + "','" + element.id + "'"+") class='btn btn-primary' title='Edit'><i class='fas fa-edit'></i></a><a href=javascript:delete_discount_item('"+element.id +"','"+element.account_discount_id+"'"+") class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></a></td>" +
                        "</tr>";




            });
            $('#itemlisttddataid').html(tabledata);

        }
    });
}
    
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </body>
</html>
