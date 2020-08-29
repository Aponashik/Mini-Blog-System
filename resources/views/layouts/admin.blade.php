<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

 <title>@yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

{{-- Toaster Css CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  @yield('css')
</head>


<body class="hold-transition sidebar-mini">
  
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('admin//img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blog|Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user.profile') }}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{(request()->is('admin/category*')) ? 'active': ''}}">
                      <i class="fas fa-tags nav-icon"></i>
                      <p>Categories</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('tag.index') }}" class="nav-link {{(request()->is('admin/tag*')) ? 'active': ''}}">
                      <i class="fas fa-tag nav-icon"></i>
                      <p>Tags</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link {{(request()->is('admin/post*')) ? 'active': ''}}">
                      <i class="fa fa-clipboard nav-icon" aria-hidden="true"></i>
                      <p>Post</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link {{(request()->is('admin/contact*')) ? 'active': ''}}">
                      <i class="fa fa-envelope nav-icon" aria-hidden="true"></i>
                      <p>Message</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{(request()->is('admin/user*')) ? 'active': ''}}">
                      <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                      <p>User</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link {{(request()->is('admin/setting*')) ? 'active': ''}}">
                      <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
                      <p>Setting</p>
                    </a>
                  </li>
          </li>

 
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image" style="">
                    <img src="{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  
                  <p style="margin-top: 5px;margin-left: 10px">
                    Your Account
                    <i class="right fas fa-angle-left" style="margin-top: 5px;"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="">
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link active">
                          <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                          <p>Your Profile</p>
                        </a>
                    </li>
                    <li class="nav-item mt-auto bg-danger">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">

                            <form method="POST" action="{{route('logout')}}" style="display: none" id="logout-form">
                              @csrf
                            </form>

                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                          </a>
                    </li>
                </ul>
              </li>
              
            </ul>
          


          
          

            <li class="text-center mt-5">
            <a href="{{ route('website') }}" class="btn btn-primary text-white" target="_blank">
              <p class="mb-0">
                View Website
              </p>
            </a>                    
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Mini Blog</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

<!--Custom File JS--->
<script src="{{ asset('admin/js/bs-custom-file-input.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('script')

{!! Toastr::message() !!}


</body>
</html>
