<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield ('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

@include('layout.adminCss')

  <link rel="shortcut icon" type="image/png" href="{{asset('admin/dist/img/icon_small.png')}}"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>

</head>
<!-- Dashboard Color -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{'/dashboard'}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>OM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WOM</b>ANAGEMENT</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('image/'.Auth::user()->foto)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->nama_karyawan }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('image/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->nama_karyawan }} - {{ Auth::user()->jabatan }}
                  <small>Member since <b>{{ Auth::user()->created_at->format('l, j F Y') }}</b></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>  -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/editUser', Auth::user()->id )}}" class="btn btn-default btn-flat btn-info">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="btn btn-default btn-flat btn-danger">Sign out</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('image/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nama_karyawan }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{'/dashboard'}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-right pull-right"></i> -->
            </span>
          </a>
        </li>

<!-- ============= SUPER ADMIN =========== -->
  @if (Auth::user()->jabatan == 'Super Admin')

            <li class="active treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{'/addUser'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
              <li class="active"><a href="{{'/showUser'}}"><i class="fa fa-eye"></i> View Data</a></li>
            </ul>
          </li>

<!--
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-hourglass-half"></i> <span>Log User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#"><i class="fa fa-eye"></i> View Data</a></li>
          </ul>
        </li>
      -->

        <li class="active treeview">
        <a href="#">
          <i class="fa fa-map"></i> <span>Data RO</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{'/addRo'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
          <li class="active"><a href="{{'showRo'}}"><i class="fa fa-eye"></i> View Data</a></li>
        </ul>
      </li>

      <li class="active treeview">
      <a href="#">
        <i class="fa fa-map-marker"></i> <span>Data MSO</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{'/addMso'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
        <li class="active"><a href="{{'showMso'}}"><i class="fa fa-eye"></i> View Data</a></li>
      </ul>
    </li>

      <li class="active treeview">
      <a href="#">
        <i class="fa fa-building-o"></i> <span>Partner</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{'/addPartner'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
        <li class="active"><a href="{{'showPartner'}}"><i class="fa fa-eye"></i> View Data</a></li>
      </ul>
    </li>
        <li class="active treeview">
        <a href="#">
          <i class="fa fa-file-excel-o"></i> <span>Data SPK</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{'/addSpk'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
          <li class="active"><a href="{{'/showSpk'}}"><i class="fa fa-eye"></i> View Data</a></li>
        </ul>
        </li>

        <!--
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-plus-square"></i> Input Data</a></li>
            <li class="active"><a href="#"><i class="fa fa-eye"></i> View Data</a></li>
          </ul>
          </li>
        -->

          <li class="active treeview">
          <a href="#">
            <i class="fa fa-file-pdf-o"></i> <span>Data Lookup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{'/showLookup'}}"><i class="fa fa-search"></i> Search Data</a></li>
            <li class="active"><a href="{{'/showExport'}}"><i class="fa fa-download"></i> Export Data</a></li>
          </ul>
          </li>

<!--============== ADMIN HO ================== -->
@elseif (Auth::user()->jabatan == 'Admin HO')
    <li class="active treeview">
    <a href="#">
      <i class="fa fa-map"></i> <span>Data RO</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{'/addRo'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
      <li class="active"><a href="{{'showRo'}}"><i class="fa fa-eye"></i> View Data</a></li>
    </ul>
  </li>

  <li class="active treeview">
  <a href="#">
    <i class="fa fa-map-marker"></i> <span>Data MSO</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{'/addMso'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
    <li class="active"><a href="{{'showMso'}}"><i class="fa fa-eye"></i> View Data</a></li>
  </ul>
</li>

  <li class="active treeview">
  <a href="#">
    <i class="fa fa-building-o"></i> <span>Partner</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{'/addPartner'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
    <li class="active"><a href="{{'showPartner'}}"><i class="fa fa-eye"></i> View Data</a></li>
  </ul>
</li>
    <li class="active treeview">
    <a href="#">
      <i class="fa fa-file-excel-o"></i> <span>Data SPK</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{'/addSpk'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
      <li class="active"><a href="{{'/showSpk'}}"><i class="fa fa-eye"></i> View Data</a></li>
    </ul>
    </li>

      <li class="active treeview">
      <a href="#">
        <i class="fa fa-file-pdf-o"></i> <span>Invoice</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-plus-square"></i> Input Data</a></li>
        <li class="active"><a href="#"><i class="fa fa-eye"></i> View Data</a></li>
      </ul>
      </li>

      <li class="active treeview">
      <a href="#">
        <i class="fa fa-file-pdf-o"></i> <span>Data Lookup</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{'/showLookup'}}"><i class="fa fa-search"></i> Search Data</a></li>
        <li class="active"><a href="{{'/showExport'}}"><i class="fa fa-download"></i> Export Data</a></li>
      </ul>
      </li>

  <!--============== ADMIN RO ================== -->
@elseif (Auth::user()->jabatan == 'Admin RO')
  <li class="active treeview">
  <a href="#">
    <i class="fa fa-file-excel-o"></i> <span>Data SPK</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{'/showSpkByRo'}}"><i class="fa fa-eye"></i> View Data</a></li>
  </ul>
  </li>

  <li class="active treeview">
  <a href="#">
    <i class="fa fa-file-pdf-o"></i> <span>Data Lookup</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{'/showLookup'}}"><i class="fa fa-search"></i> Search Data</a></li>
    <li class="active"><a href="{{'/showExport'}}"><i class="fa fa-download"></i> Export Data</a></li>
  </ul>
  </li>

  <!--============== ADMIN MSO ================== -->
@elseif (Auth::user()->jabatan == 'Admin MSO')
  <li class="active treeview">
  <a href="#">
    <i class="fa fa-file-excel-o"></i> <span>Data SPK</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{'/showSpkByMso'}}"><i class="fa fa-eye"></i> View Data</a></li>
  </ul>
  </li>

  <li class="active treeview">
  <a href="#">
    <i class="fa fa-file-pdf-o"></i> <span>Data Lookup</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{'/showLookup'}}"><i class="fa fa-search"></i> Search Data</a></li>
    <li class="active"><a href="{{'/showExport'}}"><i class="fa fa-download"></i> Export Data</a></li>
  </ul>
  </li>

  <!--============== ADMIN FINANCE ================== -->
@elseif (Auth::user()->jabatan == 'Admin Finance')
  <li class="active treeview">
  <a href="#">
    <i class="fa fa-file-excel-o"></i> <span>Data SPK</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{'/showSpkByFinance'}}"><i class="fa fa-eye"></i> View Data</a></li>
  </ul>
  </li>

    <li class="active treeview">
    <a href="#">
      <i class="fa fa-file-pdf-o"></i> <span>Invoice</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-plus-square"></i> Input Data</a></li>
      <li class="active"><a href="#"><i class="fa fa-eye"></i> View Data</a></li>
    </ul>
    </li>

    <li class="active treeview">
    <a href="#">
      <i class="fa fa-file-pdf-o"></i> <span>Data Lookup</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{{'/showLookup'}}"><i class="fa fa-search"></i> Search Data</a></li>
      <li class="active"><a href="{{'/showExport'}}"><i class="fa fa-download"></i> Export Data</a></li>
    </ul>
    </li>

    <!--============== ADMIN PARTNER ================== -->
  @elseif (Auth::user()->jabatan == 'Admin Partner')
    <li class="active treeview">
    <a href="#">
      <i class="fa fa-file-excel-o"></i> <span>Data SPK</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{'/addSpkPartner'}}"><i class="fa fa-plus-square"></i> Input Data</a></li>
      <li class="active"><a href="{{'/showSpkByPartner'}}"><i class="fa fa-eye"></i> View Data</a></li>
    </ul>
    </li>

    <li class="active treeview">
    <a href="#">
      <i class="fa fa-file-pdf-o"></i> <span>Data Lookup</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{{'/showLookup'}}"><i class="fa fa-search"></i> Search Data</a></li>
      <li class="active"><a href="{{'/showExport'}}"><i class="fa fa-download"></i> Export Data</a></li>
    </ul>
    </li>

@endif

        <li class="header">USER</li>
        <li><a href="{{url('/editUser', Auth::user()->id )}}"><i class="fa fa-user text-aqua"></i> <span>Profil</span></a></li>
        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" >
                <i class="fa fa-power-off text-red"></i> <span>Logout</span></a>
        </li>
      </ul>
    </section>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Include Sweet Alerts -->
    @include('Alerts::sweetalerts')

    <!-- Main content -->
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014 - 2018 <a href="http://purworejoberirama.com" target="_blank">Womanagement.com</a> .</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

@include('layout.adminScript')

</body>
</html>
